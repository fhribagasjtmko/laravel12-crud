<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    // Tampilkan semua produk
    public function index(): View 
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    // Form untuk menambah produk baru
    public function create(): View
    {
        return view('products.create');
    }

    // Simpan data produk baru
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
        ]);

        $image = $request->file('image');
        $image->storeAs('products', $image->hashName());

        Product::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Detail produk
    public function show(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    } 

    // Form edit produk
    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // Update data produk
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg,HEIC|max:5120',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::delete('products/' . $product->image);
            $image = $request->file('image');
            $image->storeAs('products', $image->hashName());

            $product->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
            ]);
        } else {
            $product->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    //metode untuk menghapus produk
    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        Storage::delete('products/' . $product->image);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

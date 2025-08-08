<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Laravel 12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }
        .card {
            background-color: #1c1c1c;
            color: white;
            border: none;
        }
        .btn {
            border-radius: 10px;
        }
        table {
            color: #fff;
        }
        th, td {
            vertical-align: middle;
        }
        .header-title {
            font-size: 2rem;
            font-weight: 600;
        }
        .header-subtitle {
            font-size: 1.2rem;
            color: #ccc;
        }
        .table th {
            background-color: #343a40;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h3 class="header-title">Aplikasi Laravel 12</h3>
            <p class="header-subtitle">By. Fahri Bagas Jatmiko</p>
            <hr class="border-light">
        </div>

        <div class="card shadow-lg rounded">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="{{ url('/') }}" class="btn btn-outline-light">Kembali ke Home</a>
                    <a href="{{ route('products.create') }}" class="btn btn-success">Tambah Data</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-dark table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Gambar</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stok</th>
                                <th scope="col" style="width: 20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/products/' . $product->image) }}" class="rounded shadow-sm" style="width: 150px">
                                    </td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ "Rp.".number_format($product->price, 2, ',', '.') }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Yakin ingin menghapus ini?');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-light">Tampil</a>
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Ubah</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">DATA MASIH KOSONG</td>
                                </tr>
                            @endforelse    
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>
</html>
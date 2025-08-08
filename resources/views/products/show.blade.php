<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .card {
            background-color: #1c1c1c;
            color: white;
            border: none;
        }
        .btn {
            border-radius: 10px;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        h3 {
            font-weight: 600;
        }
        .text-primary {
            color: #00d1ff !important;
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('storage/products/' . $product->image) }}" alt="Gambar Produk" class="rounded w-100">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded mb-3">
                    <div class="card-body">
                        <h3 class="text-center">{{ $product->title }}</h3>
                        <hr class="border-light">
                        <p class="fw-bold fs-5 text-primary">Rp{{ number_format($product->price, 2, ',', '.') }}</p>

                        <div class="mb-3">
                            {!! $product->description !!}
                        </div>

                        <hr class="border-light">
                        <p><strong>Stok:</strong> {{ $product->stock }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0 d-flex justify-content-end">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">← Kembali ke Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

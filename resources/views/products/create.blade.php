<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Form Tambah Data</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
    crossorigin="anonymous"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
    rel="stylesheet"
  />
  <style>
    body {
      background: linear-gradient(135deg, #121212, #1e1e2f);
      color: #eee;
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      padding: 40px 0;
    }
    .card {
      background-color: #24243e;
      border: none;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
      border-radius: 12px;
      color: #eee;
    }
    .form-label {
      font-weight: 600;
      color: #ccc;
    }
    input.form-control,
    textarea.form-control {
      background-color: #1b1b2f;
      border: 1px solid #444466;
      color: #eee;
    }
    input.form-control:focus,
    textarea.form-control:focus {
      background-color: #272746;
      border-color: #6655ff;
      box-shadow: 0 0 6px #6655ffaa;
      color: #fff;
    }
    .btn-primary {
      background-color: #6655ff;
      border: none;
      box-shadow: 0 4px 12px #6655ff99;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
      background-color: #574bcc;
    }
    .btn-warning {
      background-color: #ffaa00;
      border: none;
      box-shadow: 0 4px 12px #ffaa0099;
      font-weight: 600;
      color: #222;
      transition: background-color 0.3s ease;
    }
    .btn-warning:hover {
      background-color: #cc8800;
      color: #fff;
    }
    .text-center h3 {
      font-weight: 700;
      margin-bottom: 0.2rem;
    }
    .text-muted {
      color: #999 !important;
    }
    .alert-danger {
      background-color: rgba(139, 0, 0, 0.66);
      color: #ffdddd;
      border: none;
    }
    a.btn-secondary {
      background-color: #55557a;
      border: none;
      color: #ddd;
      font-weight: 600;
      box-shadow: 0 3px 8px #555577aa;
      transition: background-color 0.3s ease;
    }
    a.btn-secondary:hover {
      background-color: #444466;
      color: #fff;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="text-center mb-4">
          <h3>Form Tambah Produk</h3>
          <p class="text-muted">Silakan lengkapi data berikut</p>
          <a href="{{ route('products.index') }}" class="btn btn-sm btn-secondary mb-3">KEMBALI KE DATA</a>
        </div>

        <div class="card">
          <div class="card-body">
            <form
              action="{{ route('products.store') }}"
              method="POST"
              enctype="multipart/form-data"
            >
              @csrf

              <div class="form-group mb-3">
                <label for="image" class="form-label">UPLOAD GAMBAR</label>
                <input
                  type="file"
                  name="image"
                  class="form-control @error('image') is-invalid @enderror"
                />
                @error('image')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="title" class="form-label">JUDUL PRODUK</label>
                <input
                  type="text"
                  name="title"
                  class="form-control @error('title') is-invalid @enderror"
                  value="{{ old('title') }}"
                />
                @error('title')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="price" class="form-label">HARGA</label>
                <input
                  type="number"
                  name="price"
                  class="form-control @error('price') is-invalid @enderror"
                  value="{{ old('price') }}"
                />
                @error('price')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="stock" class="form-label">STOK</label>
                <input
                  type="number"
                  name="stock"
                  class="form-control @error('stock') is-invalid @enderror"
                  value="{{ old('stock') }}"
                />
                @error('stock')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group mb-4">
                <label for="description" class="form-label">DESKRIPSI PRODUK</label>
                <textarea
                  name="description"
                  class="form-control @error('description') is-invalid @enderror"
                  rows="5"
                >{{ old('description') }}</textarea>
                @error('description')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary me-2">SIMPAN</button>
              <button type="reset" class="btn btn-warning">RESET</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
    crossorigin="anonymous"
  ></script>
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('description', {
      height: 150,
      uiColor: '#272746',
      contentsCss: [
        'body {color:#eee; background-color:#1b1b2f; font-family: Poppins, sans-serif;}',
      ],
    });
  </script>
</body>
</html>

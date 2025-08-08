<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #121212;
            color: #f0f0f0;
            overflow-x: hidden;
        }
        .spinner-wrapper {
            position: fixed;
            width: 100%;
            height: 100%;
            background-color: #121212;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .typewriter h1 {
            overflow: hidden;
            border-right: .15em solid #fff;
            white-space: nowrap;
            animation: typing 3s steps(30, end), blink .75s step-end infinite;
            font-size: 2.5rem;
        }
        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }
        @keyframes blink {
            from, to { border-color: transparent }
            50% { border-color: white }
        }
        .hero {
            padding: 150px 0;
            text-align: center;
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
        }
        .parallax {
            background-image: url('https://source.unsplash.com/1600x900/?technology');
            min-height: 400px;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        #chart-container {
            background: #1e1e1e;
            padding: 40px;
            border-radius: 12px;
        }
        .lottie {
            width: 300px;
            margin: auto;
        }
    </style>
</head>
<body>

<div class="spinner-wrapper" id="spinner">
    <div class="spinner-border text-light" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<audio autoplay loop>
    <source src="https://www.bensound.com/bensound-music/bensound-summer.mp3" type="audio/mp3">
</audio>

<div class="hero">
    <div class="typewriter">
        <h1>Selamat Datang di Aplikasi Laravel 12</h1>
    </div>
    <p class="lead mt-3">CRUD Produk dengan Laravel, Bootstrap, dan Fitur Interaktif Canggih</p>
    <a href="{{ route('products.index') }}" class="btn btn-light btn-lg shadow mt-4">Lihat Produk</a>
    <div class="lottie mt-5" id="lottie"></div>
</div>

<div class="parallax"></div>

<div class="container mt-5" id="chart-container">
    <h3 class="text-center mb-4">Grafik Penjualan Produk</h3>
    <canvas id="salesChart" height="100"></canvas>
</div>

<div class="container text-center mt-5 mb-4">
    <p class="text-muted">Dibuat oleh <strong>Fahri Bagas Jatmiko</strong> | &copy; {{ date('Y') }}</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.4/lottie.min.js"></script>
<script>
    window.addEventListener('load', function () {
        document.getElementById('spinner').style.display = 'none';
    });

    const ctx = document.getElementById('salesChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Penjualan',
                data: [30, 90, 30, 50, 20, 30],
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { labels: { color: 'white' } }
            },
            scales: {
                x: { ticks: { color: 'white' } },
                y: { ticks: { color: 'white' } }
            }
        }
    });

    lottie.loadAnimation({
        container: document.getElementById('lottie'),
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: 'https://assets1.lottiefiles.com/packages/lf20_i2eyukor.json' // Ganti dengan animasi Lottie lainnya bila perlu
    });
</script>
</body>
</html>

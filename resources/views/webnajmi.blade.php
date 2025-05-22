<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hayu Cukur</title>
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#ff0000">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #fff;
        }
        .navbar-brand img {
            height: 40px;
        }
        .hero {
            background: url('/images/barber-bg.jpg') no-repeat center center;
            background-size: cover;
            min-height: 80vh;
            color: white;
            position: relative;
        }
        .hero-overlay {
            background: rgba(0,0,0,0.5);
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 60px 20px;
            text-align: center;
        }
        .features {
            padding: 60px 20px;
        }
        .location {
            padding: 30px 20px;
            background-color: #f8f9fa;
        }
        .btn-primary {
            background-color: #ff0000;
            border: none;
        }
        .btn-primary:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="images/hayucukur.png" alt="Logo Hayu Cukur" class="me-2">
            <strong>Hayu Cukur</strong>
        </a>
        <div class="ms-auto">
            <a href="/login" class="btn btn-outline-dark me-2">Login</a>
            <a href="/register" class="btn btn-primary">Daftar</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-overlay">
            <h1 class="display-4 fw-bold">Cukur Gampang & Kekinian</h1>
            <p class="lead">Pilih tukang cukur, layanan, waktu & bayar pakai QRIS atau tunai</p>
            <a href="/booking" class="btn btn-primary btn-lg mt-3">Booking Sekarang</a>
        </div>
    </div>

    <!-- Fitur -->
    <section class="features text-center">
        <div class="container">
            <h2 class="mb-5">Fitur Unggulan</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h4>🗓️ Booking Mudah</h4>
                    <p>Pilih tempat dan waktu cukur yang sesuai dengan jadwalmu.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h4>💇 Pilih Layanan</h4>
                    <p>Beragam layanan cukur seperti cukur rambut, jenggot, hingga paket spa pria.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h4>💳 Bayar via QRIS</h4>
                    <p>Pembayaran bisa langsung di tempat atau transfer digital pakai QRIS.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Lokasi -->
    <section class="location text-center">
        <h3 class="mb-4">📍 Lokasi Kami</h3>
        <div class="container">
            <img src="/images/lokasi-barber.jpg" class="img-fluid mb-3" alt="Lokasi Barbershop" style="max-height: 300px; object-fit: cover;">
            <!-- Atau pakai Google Maps embed -->
            <!--
            <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            -->
        </div>
    </section>

</body>
</html>

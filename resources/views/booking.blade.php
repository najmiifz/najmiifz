<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - Hayu Cukur</title>

    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#B22222">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Lato', sans-serif;
            color: #495057;
        }

        h1, h2, h3, .navbar-brand, .btn {
            font-family: 'Poppins', sans-serif;
        }

        .navbar-brand img {
            height: 45px;
        }

        .btn-primary {
            background-color: #B22222;
            border-color: #B22222;
            padding: 10px 25px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #9f1f1f;
            border-color: #9f1f1f;
            transform: scale(1.05);
        }

        .booking-section {
            padding: 80px 20px;
            background: #fff;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
        }

        .card {
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.07);
            border: none;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="https://placehold.co/100x100/B22222/white?text=HC" alt="Logo Hayu Cukur" class="me-2 rounded-circle">
            <span class="fw-bold fs-5">HayuCukur</span>
        </a>
        <div class="ms-auto">
            <a href="/dashboard" class="btn btn-primary">Beranda</a>
        </div>
    </div>
</nav>

<!-- Booking Section -->
<section class="booking-section">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Form Booking Cukur</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <form action="/submit-booking" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
                        </div>
                        <div class="mb-3">
                            <label for="barbershop" class="form-label">Pilih Barbershop</label>
                            <select class="form-select" id="barbershop" name="barbershop" required>
                                <option value="">-- Pilih --</option>
                                <option value="The Cut Garage">The Cut Garage</option>
                                <option value="Gentlemen's Cut">Gentlemen's Cut</option>
                                <option value="King's Barbershop">King's Barbershop</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="layanan" class="form-label">Layanan</label>
                            <select class="form-select" id="layanan" name="layanan" required>
                                <option value="">-- Pilih Layanan --</option>
                                <option value="Potong Rambut">Potong Rambut</option>
                                <option value="Cukur Jenggot">Cukur Jenggot</option>
                                <option value="Creambath">Creambath</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="waktu" class="form-label">Jam Booking</label>
                            <input type="time" class="form-control" id="waktu" name="waktu" required>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Konfirmasi Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Optional: Footer or Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

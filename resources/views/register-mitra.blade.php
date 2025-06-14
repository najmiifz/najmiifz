<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sebagai Mitra - HayuCukur</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .btn-primary {
            background-color: #B22222;
            border-color: #B22222;
        }

        .btn-primary:hover {
            background-color: #9f1f1f;
            border-color: #9f1f1f;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top px-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="https://placehold.co/100x100/B22222/fff?text=HC" alt="Logo Hayu Cukur" class="me-2 rounded-circle" style="height: 45px;">
            <span class="fw-bold fs-5">HayuCukur</span>
        </a>
        <div class="ms-auto">
            <a href="/login" class="btn btn-outline-dark me-2">Login</a>
            <a href="/register" class="btn btn-primary">Daftar</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="form-container">
        <h2 class="mb-4 text-center fw-bold">Daftar Sebagai Mitra Barbershop</h2>
        <form action="/register-mitra" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_toko" class="form-label">Nama Barbershop</label>
                <input type="text" class="form-control" id="nama_toko" name="nama_toko" required>
            </div>
            <div class="mb-3">
                <label for="pemilik" class="form-label">Nama Pemilik</label>
                <input type="text" class="form-control" id="pemilik" name="pemilik" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Lengkap</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Nomor Telepon</label>
                <input type="tel" class="form-control" id="telepon" name="telepon" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Aktif</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

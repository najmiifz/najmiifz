<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Hayu Cukur</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
        }

        .register-box {
            max-width: 500px;
            margin: 80px auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .btn-register {
            background-color: #B22222;
            border: none;
        }

        .btn-register:hover {
            background-color: #a11d1d;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="https://placehold.co/100x100/B22222/ffffff?text=HC" alt="Logo" height="45" class="me-2 rounded-circle">
                <span class="fw-bold fs-5">HayuCukur</span>
            </a>
        </div>
           <div class="ms-auto">
                <a href="/beranda" class="btn btn-primary">Beranda</a>
            </div>
    </nav>

    {{-- Form Daftar --}}
    <div class="register-box">
        <h3 class="text-center mb-4">Buat Akun HayuCukur</h3>
        <form method="POST" action="{{ route('mitra.register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name" required placeholder="Contoh: Rofi Aziz">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" class="form-control" name="email" id="email" required placeholder="email@example.com">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" name="password" id="password" required placeholder="••••••••">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required placeholder="••••••••">
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-register text-white fw-bold">Daftar</button>
            </div>

            <div class="text-center mt-3">
                <small>Sudah punya akun? <a href="/login-mitra">Login di sini</a></small>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

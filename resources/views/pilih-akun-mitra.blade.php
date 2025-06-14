<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Masuk atau Daftar - Hayu Cukur</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .container-box {
            max-width: 500px;
            margin: 100px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .btn-option {
            display: block;
            width: 100%;
            margin-bottom: 20px;
            padding: 15px;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 12px;
        }

        .btn-daftar {
            background-color: #B22222;
            color: #fff;
            border: none;
        }

        .btn-daftar:hover {
            background-color: #9c1c1c;
        }

        .btn-login {
            border: 2px solid #B22222;
            color: #B22222;
            background-color: transparent;
        }

        .btn-login:hover {
            background-color: #fcebea;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="https://placehold.co/100x100/B22222/white?text=HC" alt="Logo Hayu Cukur" class="me-2 rounded-circle" height="45">
                <span class="fw-bold fs-5">HayuCukur</span>
            </a>
            <div class="ms-auto">
                <a href="/login" class="btn btn-outline-dark me-2">Login</a>
                <a href="/register" class="btn btn-primary">Daftar</a>
            </div>
        </div>
    </nav>

    {{-- Konten Pilihan --}}
    <div class="container-box mt-5">
        <h2 class="mb-4">Gabung ke HayuCukur sebagai mitra</h2>
        <p class="mb-4">Pilih salah satu untuk mulai menggunakan aplikasi.</p>

        <a href="/register-mitra" class="btn btn-option btn-daftar">Belum punya akun? Daftar Sekarang</a>
        <a href="/login-mitra" class="btn btn-option btn-login">Sudah punya akun? Login</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

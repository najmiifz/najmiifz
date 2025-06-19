<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hayu Cukur</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }

        .login-box {
            max-width: 450px;
            margin: 80px auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .btn-login {
            background-color: #B22222;
            border: none;
        }

        .btn-login:hover {
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
    </nav>

    {{-- Form Login --}}
    <div class="login-box">
        <h3 class="text-center mb-4">Login ke HayuCukur Sebagai Mitra</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" required placeholder="email@example.com">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" name="password" id="password" required placeholder="••••••••">
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-login text-white fw-bold">Login</button>
            </div>

            <div class="text-center mt-3">
                <small>Belum punya akun? <a href="/register-mitra">Daftar sekarang</a></small>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

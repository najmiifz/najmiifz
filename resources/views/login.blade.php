<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hayu Cukur</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #f0d067;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .auth-box {
            width: 100%;
            max-width: 450px;
            background-color: #1c1c1c;
            padding: 40px;
            border-radius: 20px;
            border: 1px solid #333;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
        .form-label { color: #f0d067; }
        .form-control {
            color: #f0d067;
            background-color: #2a2a2a;
            border-color: #444;
            padding: 12px 15px;
        }
        .form-control:focus {
            background-color: #2a2a2a;
            color: #f0d067;
            border-color: #f0d067;
            box-shadow: 0 0 0 0.25rem rgba(240, 208, 103, 0.25);
        }
        .form-control::placeholder { color: #aaa; }
        .btn-submit {
            background-color: #f0d067;
            color: #121212;
            border: none;
            font-weight: bold;
            padding: 12px;
        }
        .auth-link {
            color: #f0d067;
            text-decoration: none;
        }
        .auth-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="auth-box">
        <div class="text-center mb-4">
            <a href="{{ route('beranda') }}">
                <img src="/images/logocukur.png" alt="Logo" style="height: 60px;">
            </a>
        </div>
        @php
            $isMitra = isset($role) && $role === 'mitra';
            $title = $isMitra ? 'Login Sebagai Mitra' : 'Login ke Akun Anda';
            $registerLink = $isMitra ? route('register', ['role' => 'mitra']) : route('register');
        @endphp

        <h3 class="text-center mb-4 fw-bold">{{ $title }}</h3>

        @if ($errors->any())
            <div class="alert alert-danger bg-danger text-white border-0" role ="alert">
                {{ $errors->first('email') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required placeholder="email@example.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" name="password" id="password" required placeholder="••••••••">
            </div>
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-submit">Login</button>
            </div>
            <div class="text-center mt-3">
                <small class="text-white-50">Belum punya akun? <a href="{{ $registerLink }}" class="auth-link fw-bold">Daftar sekarang</a></small>
            </div>
        </form>
    </div>
</body>
</html>

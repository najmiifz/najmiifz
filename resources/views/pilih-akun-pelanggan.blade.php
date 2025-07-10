<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gabung ke Hayu Cukur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .choice-box {
            text-align: center;
            width: 100%;
            max-width: 500px;
            background-color: #1c1c1c;
            padding: 40px;
            border-radius: 20px;
            border: 1px solid #333;
        }
        .btn-option {
            display: block;
            width: 100%;
            margin-bottom: 20px;
            padding: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-primary-custom {
            background-color: #f0d067;
            color: #121212;
            border: none;
        }
        .btn-primary-custom:hover {
            background-color: #d4b95d;
            color: #121212;
        }
        .btn-secondary-custom {
            border: 2px solid #f0d067;
            color: #f0d067;
            background-color: transparent;
        }
        .btn-secondary-custom:hover {
            background-color: #f0d067;
            color: #121212;
        }
    </style>
</head>
<body>
    <div class="choice-box">
        <a href="{{ route('beranda') }}" class="d-block mb-4">
            <img src="/images/logocukur.png" alt="Logo" style="height: 60px;">
        </a>
        <h2 class="mb-3 fw-bold">Gabung ke HayuCukur</h2>
        <p class="mb-4 text-white-50">Pilih salah satu untuk mulai menggunakan aplikasi.</p>

        <a href="{{ route('register') }}" class="btn btn-option btn-primary-custom">Belum punya akun? Daftar Sekarang</a>
        <a href="{{ route('login') }}" class="btn btn-option btn-secondary-custom">Sudah punya akun? Login</a>
        <hr style="border-color: #444;">
        <a href="{{ route('pilih-akun-mitra') }}" class="btn btn-option btn-secondary-custom">Daftar Sebagai Mitra</a>
    </div>
</body>
</html>

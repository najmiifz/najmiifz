<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Hayu Cukur') - Cukur Gampang & Kekinian</title>

    {{-- Stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css'])

    <style>
        body {
            background-color: #121212;
            color: #f0d067;
            font-family: 'Poppins', sans-serif;
        }
        .card {
            background-color: #1c1c1c;
            border: 1px solid #333;
            color: #f0d067;
            border-radius: 15px;
        }
        .btn-gold {
            background-color: #f0d067;
            color: #121212;
            font-weight: bold;
            border: none;
        }
        .btn-gold:hover {
            background-color: #d4b95d;
            color: #121212;
        }
        hr {
            border-color: #444;
        }
    </style>
</head>
<body>

    @include('layouts.header')

    <main class="py-5">
        {{-- This container will center the content of all child pages --}}
        <div class="container">
            @yield('content')
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>

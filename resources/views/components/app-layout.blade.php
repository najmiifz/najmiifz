<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title ?? 'HayuCukur' }} - Cukur Gampang & Kekinian</title>

    {{-- Stylesheets --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />

     @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Menggunakan Vite untuk menampikan style -->

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
            {{ $slot }}
        </div>
    </main>
    @stack('scripts')
</body>
</html>

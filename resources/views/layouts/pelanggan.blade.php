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

    {{-- Vite for custom styles (if you have any for the customer side) --}}
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

    {{-- Include the consistent website header --}}
    @include('layouts.header')

    <main class="py-4">
        {{-- Content from other pages will be injected here --}}
        @yield('content')
    </main>

    {{-- You can add a consistent footer here if you have one --}}
    {{-- @include('layouts.footer') --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Any additional page-specific scripts can be pushed here --}}
    @stack('scripts')
</body>
</html>

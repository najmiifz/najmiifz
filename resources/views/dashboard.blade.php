<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Hayu Cukur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-white shadow-sm px-4">
    <a class="navbar-brand d-flex align-items-center" href="/webnajmi">
        <img src="/images/logo.png" alt="Logo Hayu Cukur" style="height: 40px;" class="me-2">
        <strong>Hayu Cukur</strong>
    </a>
    <div class="ms-auto">
        @auth
            <a href="{{ route('logout') }}" class="btn btn-outline-dark me-2">Logout</a>
        @endauth
    </div>
</nav>

<div class="container mt-5">
    <h1>Selamat datang, {{ Auth::user()->name }}</h1>
    <p>Ini adalah dashboard setelah login.</p>
</div>
</body>
</html>

<head>
    <meta charset="UTF-8">
    <title>Register - Hayu Cukur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-light bg-white shadow-sm px-4">
    <a class="navbar-brand d-flex align-items-center" href="/">
        <img src="/images/logo.png" alt="Logo Hayu Cukur" style="height: 40px;" class="me-2">
        <strong>Hayu Cukur</strong>
    </a>
    <div class="ms-auto">
        <a href="/webnajmi" class="btn btn-outline-dark me-2">home</a>
        <a href="/login" class="btn btn-outline-dark me-2">Login</a>
        <a href="/register" class="btn btn-danger">Daftar</a>
    </div>
</nav>

<!-- Form Register -->
<div class="container mt-5" style="max-width: 400px;">
    <h3 class="mb-4 text-center">Daftar</h3>

    {{-- Show validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Show success message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="/register">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input name="name" type="text" class="form-control" placeholder="Masukkan nama lengkap">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input name="email" type="email" class="form-control" placeholder="Masukkan email">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input name="password" type="password" class="form-control" placeholder="Masukkan password">
        </div>
        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input name="password_confirmation" type="password" class="form-control" placeholder="Ulangi password">
        </div>
        <button type="submit" class="btn btn-danger w-100">Daftar</button>
    </form>
</div>

</body>
</html>

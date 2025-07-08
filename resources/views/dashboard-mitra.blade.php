<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Mitra - Hayu Cukur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap + Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
        }

        .sidebar {
            width: 250px;
            background-color: #B22222;
            color: white;
            min-height: 100vh;
            padding: 2rem 1rem;
            position: fixed;
        }

        .sidebar h4 {
            font-weight: bold;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
        }

        .sidebar h4 img {
            width: 35px;
            height: 35px;
            margin-right: 10px;
            border-radius: 50%;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .sidebar a:hover {
            background-color: #9f1f1f;
            padding: 0.5rem;
            border-radius: 8px;
        }

        .main-content {
            margin-left: 250px;
            padding: 2rem;
        }

        .card {
            border: none;
            border-radius: 15px;
            transition: 0.3s;
        }

        .card:hover {
            transform: scale(1.03);
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        .card h5 {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
        <div class="sidebar">
            <h4>
                <img src="/images/logocukur.png" alt="Logo">
                <span>Mitra HayuCukur</span>
            </h4>
            <a href="{{ route('dashboard.mitra') }}"><i class="bi bi-house-door-fill"></i> Dashboard</a>

            {{-- Updated Booking Link --}}
            <a href="#"><i class="bi bi-calendar-check-fill"></i> Bookingan Pelanggan</a>

            {{-- Updated and "Smart" Kelola Link --}}
            @if ($barbershop)
                <a href="{{ route('mitra.barbershop.edit', $barbershop->id) }}"><i class="bi bi-scissors"></i> Kelola Barbershop</a>
            @else
                <a href="{{ route('mitra.barbershop.create') }}"><i class="bi bi-scissors"></i> Kelola Barbershop</a>
            @endif

            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                <i class="bi bi-box-arrow-right me-1"></i>Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        <div class="main-content">
            <h2>Halo, Mitra!</h2>
            <p class="text-muted">Selamat datang di Dashboard HayuCukur</p>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="row mt-4">
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm p-4">
                        <h5><i class="bi bi-calendar-check-fill"></i> Bookingan Pelanggan</h5>
                        <p>Lihat semua daftar bookingan pelanggan yang masuk ke barbershop kamu.</p>
                        {{-- Updated Booking Link --}}
                        <a href="#" class="btn btn-danger">Lihat Bookingan</a>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm p-4">
                        <h5><i class="bi bi-scissors"></i> Kelola Barbershop</h5>
                        <p>Edit nama, alamat, jam operasional dan info lainnya dari barbershop kamu.</p>

                        {{-- Updated and "Smart" Kelola Link --}}
                        @if ($barbershop)
                            <a href="{{ route('mitra.barbershop.edit', $barbershop->id) }}" class="btn btn-dark">Kelola Sekarang</a>
                        @else
                            <a href="{{ route('mitra.barbershop.create') }}" class="btn btn-dark">Kelola Sekarang</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>


</body>
</html>

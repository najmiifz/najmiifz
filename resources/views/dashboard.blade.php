<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Pelanggan - Hayu Cukur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #121212;
            color: #f0d067;
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background-color: #1f1f1f !important;
            border-bottom: 1px solid #333;
        }
        .navbar .nav-link, .navbar .navbar-brand, .dropdown-item, .nav-link span {
            color: #f0d067 !important;
        }
        .dropdown-menu {
            background-color: #1f1f1f;
            border-color: #333;
        }
        .dropdown-item:hover {
            background-color: #2a2a2a;
        }
        .form-label { color: #f0d067; }
        .form-control, .form-select {
            color: #f0d067;
            background-color: #2a2a2a;
            border-color: #444;
        }
        .form-control:focus, .form-select:focus {
            background-color: #2a2a2a;
            color: #f0d067;
            border-color: #f0d067;
            box-shadow: 0 0 0 0.25rem rgba(240, 208, 103, 0.25);
        }
        .form-control::placeholder { color: #aaa; }
        .form-select option { background-color: #2a2a2a; color: #f0d067; }
        .btn-danger { background-color: #f0d067; color: #121212; border: none; font-weight: bold; }
        .btn-outline-danger { color: #f0d067; border-color: #f0d067; }
        .btn-outline-danger:hover { background-color: #f0d067; color: #121212; }
        .barber-card {
            background-color: #1c1c1c;
            color: #f0d067;
            border: 1px solid #333;
            transition: 0.3s;
            border-radius: 15px;
        }
        .barber-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 14px rgba(240, 208, 103, 0.15);
            border-color: #f0d067;
        }
        hr { border-color: #f0d067; opacity: 0.2; }
        .carousel-item img { height: 400px; object-fit: cover; filter: brightness(50%); }
        .carousel-caption { top: 50%; transform: translateY(-50%); color: #f0d067; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); }
        .carousel-caption h5 { font-size: 2.5rem; font-weight: bold; }
        .carousel-caption p { font-size: 1.2rem; }
    </style>
</head>
<body>

@include('layouts.header')

<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1599351542802-2b57b68aa334?q=80&w=2070&auto=format&fit=crop" class="d-block w-100" alt="Promo 1">
            <div class="carousel-caption d-none d-md-block">
                <h5>Gaya Baru, Semangat Baru</h5>
                <p>Temukan potongan rambut yang paling sesuai dengan kepribadian Anda.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1622288432453-3973719b349f?q=80&w=2070&auto=format&fit=crop" class="d-block w-100" alt="Jadwalkan">
            <div class="carousel-caption d-none d-md-block">
                <h5>Jadwalkan Kunjungan Anda</h5>
                <p>Booking mudah dan cepat, tanpa perlu antre.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next"><span class="carousel-control-next-icon"></span></button>
</div>

<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Temukan Barbershop Terbaik</h2>
        <p class="text-muted">Pilih berdasarkan kota dan layanan yang Anda inginkan.</p>
    </div>

    <form action="{{ route('dashboard') }}" method="GET" class="row g-3 mb-5 p-4 rounded" style="background-color: #1c1c1c; border: 1px solid #333;">
        <div class="col-md-6">
            <label for="kota" class="form-label">Kota</label>
            <select name="kota" id="kota" class="form-select">
                <option value="">Semua Kota</option>
                @foreach($locations as $location)
                    <option value="{{ $location }}" {{ request('kota') == $location ? 'selected' : '' }}>{{ $location }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="layanan" class="form-label">Layanan</label>
            <select name="layanan" id="layanan" class="form-select">
                <option value="">Semua Layanan</option>
                 @foreach($allServices as $service)
                    <option value="{{ $service }}" {{ request('layanan') == $service ? 'selected' : '' }}>{{ $service }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 text-end">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-danger">Reset Filter</a>
            <button type="submit" class="btn btn-danger"><i class="bi bi-search"></i> Cari Barbershop</button>
        </div>
    </form>

    <div class="row g-4">
        @forelse ($barbershops as $barbershop)
            <div class="col-lg-4 col-md-6">
                <div class="card barber-card h-100">
                    <img src="{{ asset('storage/' . $barbershop->image) }}" class="card-img-top" alt="{{ $barbershop->name }}" style="height: 220px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $barbershop->name }}</h5>
                        <p class="card-text mb-2 text-white-50"><i class="bi bi-geo-alt-fill"></i> {{ $barbershop->location }}</p>
                        <hr>
                        <div class="mt-auto">
                            <a href="{{ route('barbershop.show', $barbershop->id) }}" class="btn btn-danger w-100">Lihat Detail & Booking</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-shop-window fs-1 text-muted"></i>
                <h5 class="mt-3">Oops! Tidak ada barbershop yang cocok.</h5>
                <p class="text-muted">Coba ubah filter pencarian Anda.</p>
            </div>
        @endforelse
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard - Hayu Cukur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <style>
        body { background-color: #f8f9fa; }
        .card-barber:hover { transform: translateY(-5px); }
        .card-barber { transition: all 0.2s ease; }
    </style>
</head>
<body>
    @include('layouts.header')
    <div class="ms-auto">
        @auth
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" class="btn btn-outline-danger me-2">
                <i class="bi bi-box-arrow-right me-1"></i>Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth
    </div>
</nav>

    <main class="container my-5">
        <section class="card p-4 mb-5">
            <h4 class="fw-bold">Cari Barbershop Favoritmu</h4>
            <form action="{{ route('dashboard') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Nama barbershop atau lokasi...">
                    <button class="btn btn-danger" type="submit"><i class="bi bi-search"></i> Cari</button>
                </div>
            </form>
        </section>

        <section>
            <h3 class="fw-bold mb-4">Pilihan Untukmu</h3>
            <div class="row g-4">
                @forelse($barbershops as $barber)
                    <div class="col-lg-3 col-md-6">
                        <div class="card h-100 shadow-sm border-0 card-barber">
                            <img src="{{ $barber->image_url ?? 'https://placehold.co/600x400' }}" class="card-img-top" alt="{{ $barber->name }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">{{ $barber->name }}</h5>
                                <p class="card-text text-muted"><i class="bi bi-geo-alt-fill"></i> {{ $barber->location }}</p>
                                <div class="mt-auto">
                                    <a href="{{ route('barbershop.show', $barber->id) }}" class="btn btn-danger w-100">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <h5>Oops! Barbershop tidak ditemukan.</h5>
                            <p class="text-muted">Coba gunakan kata kunci lain.</p>
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-danger mt-3">Tampilkan Semua Barbershop</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </section>
    </main>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Mitra - Hayu Cukur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #121212; color: #f0d067; font-family: 'Poppins', sans-serif; }
        .navbar { background-color: #1f1f1f !important; border-bottom: 1px solid #333; }
        .navbar .nav-link, .navbar .navbar-brand, .dropdown-item, .nav-link span { color: #f0d067 !important; }
        .card { background-color: #1c1c1c; border: 1px solid #333; border-radius: 15px; color: #f0d067; }
        .card h4, .card h5, .form-label, .form-check-label { color: #f0d067; }
        .stat-card { text-align: center; padding: 20px; }
        .stat-card .display-4 { font-weight: 700; }
        .btn-outline-light { border-color: #f0d067; color: #f0d067; }
        .btn-outline-light:hover { background-color: #f0d067; color: #121212; }
    </style>
</head>
<body>

@include('layouts.header')

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Profil Mitra</h2>
        <a href="{{ route('profile.edit') }}" class="btn btn-outline-light">
            <i class="bi bi-pencil-square me-2"></i>Edit Profil
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success" style="background-color: #198754; color: white; border: none;">{{ session('success') }}</div>
    @endif

    <!-- Business Stats -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card stat-card">
                <div class="display-4">{{ $stats['total_bookings'] }}</div>
                <div class="text-muted">Total Booking</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stat-card">
                <div class="display-4">{{ $stats['today_bookings'] }}</div>
                <div class="text-muted">Booking Hari Ini</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stat-card">
                <div class="display-4">Rp{{ number_format($stats['total_earnings'], 0, ',', '.') }}</div>
                <div class="text-muted">Total Pendapatan</div>
            </div>
        </div>
    </div>

    <!-- Profile Info -->
    <div class="card p-4">
        <h4 class="mb-4">Informasi Akun</h4>
        <p class="mb-2"><strong>Nama:</strong><br>{{ $user->name }}</p>
        <p class="mb-0"><strong>Email:</strong><br>{{ $user->email }}</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

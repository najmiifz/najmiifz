@extends('layouts.mitra')

@section('title', 'Dashboard Mitra')

@section('content')
    <h2 class="fw-bold">Halo, Mitra!</h2>
    <p class="text-white-50">Selamat datang di Dashboard HayuCukur. Berikut adalah ringkasan bisnis Anda hari ini.</p>

    {{-- Stats Section --}}
    <div class="row mt-4">
        <div class="col-md-4 mb-4">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-journal-text fs-1 me-4"></i>
                        <div>
                            <h5 class="card-title">Total Booking</h5>
                            <p class="card-text fs-4 fw-bold">{{ $totalBookings }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-calendar-day fs-1 me-4"></i>
                        <div>
                            <h5 class="card-title">Booking Hari Ini</h5>
                            <p class="card-text fs-4 fw-bold">{{ $todayBookings }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-cash-coin fs-1 me-4"></i>
                        <div>
                            <h5 class="card-title">Total Pendapatan Hari Ini</h5>
                            <p class="card-text fs-4 fw-bold">Rp {{ number_format($totalPendapatanHariIni, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-4" style="background-color: #198754; color: white; border: none;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Main Action Cards --}}
    <div class="row mt-4">
        <div class="col-md-6 mb-4">
            <a href="{{ route('mitra.bookings.index') }}" class="card-link">
                <div class="card stat-card p-4 h-100">
                    <h5 class="fw-bold"><i class="bi bi-calendar-check-fill me-2"></i>Bookingan Pelanggan</h5>
                    <p>Lihat semua daftar bookingan pelanggan yang masuk ke barbershop kamu.</p>
                </div>
            </a>
        </div>

        <div class="col-md-6 mb-4">
            <a href="{{ route('mitra.barbershops.index') }}" class="card-link">
                <div class="card stat-card p-4 h-100">
                    <h5 class="fw-bold"><i class="bi bi-scissors me-2"></i>Kelola Barbershop</h5>
                    <p>Edit nama, alamat, jam operasional dan info lainnya dari barbershop kamu.</p>
                </div>
            </a>
        </div>
    </div>
@endsection

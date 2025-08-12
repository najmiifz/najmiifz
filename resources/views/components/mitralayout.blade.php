<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard Mitra' }} - Hayu Cukur</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        /* General Body and Font Styles */
        body {
            background-color: #121212;
            color: #f0d067;
            font-family: 'Poppins', sans-serif;
        }
        .main-wrapper {
            display: flex;
        }

        /* Sidebar Navigation */
        .sidebar {
            width: 250px;
            background-color: #1f1f1f;
            min-height: 100vh;
            padding-top: 20px;
            transition: margin-left 0.3s ease-in-out;
        }
        .sidebar .nav-link {
            color: #f0d067; padding: 15px 20px; font-weight: 600;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: #121212 !important; background-color: #f0d067;
        }

        /* Main Content Area */
        .main-content {
            flex: 1;
            overflow-x: hidden;
            width: calc(100% - 250px);
        }

        /* General Card Styling */
        .card {
            background-color: #1c1c1c;
            border: 1px solid #333;
            color: #e9ecef;
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            border-color: #f0d067;
            box-shadow: 0 0 20px rgba(240, 208, 103, 0.25);
        }
        .card h1, .card h2, .card h3, .card h4, .card h5, .card h6, .card p, .card .card-title, .card .card-text {
            color: #e9ecef;
        }
        .card h1, .card h2, .card h3, .card h4, .card h5, .card-link-title, .stat-card i {
            color: #f0d067;
        }
        .text-white-50 {
            color: rgba(255, 255, 255, 0.5) !important;
        }
        a.card-link {
            text-decoration: none;
        }

        /* Button Styling */
        .btn-gold {
            background-color: #f0d067; color: #121212; border: 1px solid #f0d067; font-weight: bold;
        }
        .btn-gold:hover {
            background-color: #d4b55a; border-color: #d4b55a; color: #121212;
        }
        .btn-outline-gold {
            color: #f0d067; border-color: #f0d067;
        }
        .btn-outline-gold:hover {
            color: #121212; background-color: #f0d067; border-color: #f0d067;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .sidebar {
                position: fixed; margin-left: -250px; height: 100%; z-index: 1030;
            }
            .sidebar.active {
                margin-left: 0;
            }
            .main-content {
                width: 100%; margin-left: 0;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="main-wrapper">
        <div class="sidebar d-flex flex-column flex-shrink-0 p-3">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('dashboard.mitra') }}" class="nav-link {{ request()->routeIs('dashboard.mitra') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2 me-2"></i>Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('mitra.barbershops.index') }}" class="nav-link {{ request()->routeIs('mitra.barbershops.index') ? 'active' : '' }}">
                        <i class="bi bi-scissors me-2"></i>Kelola Barbershop
                    </a>
                </li>
                <li>
                    <a href="{{ route('mitra.bookings.index') }}" class="nav-link {{ request()->routeIs('mitra.bookings.index') ? 'active' : '' }}">
                        <i class="bi bi-calendar-check-fill me-2"></i>Bookingan
                    </a>
                </li>
            </ul>
        </div>

        <div class="main-content">
            @include('layouts.header')
            <div class="container-fluid p-3 p-md-4">
                @if(session('success'))
                    <div class="alert alert-success" style="background-color: #198754; color: white; border: none;">
                        {{ session('success') }}
                    </div>
                @endif
                {{ $slot }}
            </div>
        </div>
    </div>

    @push('scripts')
    {{-- This script handles the mobile sidebar toggle --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggler = document.querySelector('.navbar-toggler');
            const sidebar = document.querySelector('.sidebar');
            if (toggler && sidebar) {
                toggler.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                });
            }
        });
    </script>
    @endpush
    @stack('page-scripts')
</body>
</html>

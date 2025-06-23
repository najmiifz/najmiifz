<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Hayu Cukur</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons for modern icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* A slightly off-white background makes the cards stand out */
        body {
            background-color: #f8f9fa;
            font-family: 'Inter', sans-serif; /* A clean, modern font */
        }

        /* Styles for the icons within the cards */
        .card-icon {
            font-size: 3rem;
            color: var(--bs-primary);
        }

        /* A subtle transition for the hover effect */
        .card {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            border: none;
        }

        /* A lift effect on hover to make the UI feel more interactive */
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }

        /* Custom primary button color to match a modern barbershop theme */
        .btn-primary {
            background-color: #1a252f;
            border-color:#1a252f;
        }
        .btn-primary:hover {
            background-color: #34495e;
            border-color: #34495e;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>

<!-- Navbar (unchanged as requested) -->
<nav class="navbar navbar-light bg-white shadow-sm px-4">
    <a class="navbar-brand d-flex align-items-center" href="/beranda">
        <!-- Using a placeholder for the logo -->
        <img src="https://placehold.co/150x40/1a252f/ffffff?text=Hayu+Cukur&font=raleway" alt="Logo Hayu Cukur" style="height: 40px;" class="me-2 rounded">
        <strong style="font-weight: 700;">Hayu Cukur</strong>
    </a>
    <div class="ms-auto">
        @auth
            <!-- The route for logout is unchanged -->
            <a href="{{ route('logout') }}" class="btn btn-outline-danger me-2">
                <i class="bi bi-box-arrow-right me-1"></i>Logout
            </a>
        @endauth
    </div>
</nav>

<!-- Main Dashboard Content -->
<div class="container my-5">

    <!-- Centered Welcome Header -->
    <div class="text-center mb-5">
        <h1 class="display-5">Selamat Datang, {{ Auth::user()->name }}!</h1>
        <p class="lead text-muted">Siap untuk tampil keren? Kelola jadwal pangkas rambutmu di sini.</p>
    </div>

    <!-- Card-based layout for user actions -->
    <div class="row justify-content-center">

        <!-- Card 1: Booking Sekarang (Primary Action) -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body p-4 d-flex flex-column">
                    <div class="mb-3">
                        <i class="bi bi-calendar2-check card-icon"></i>
                    </div>
                    <h5 class="card-title">Booking Sekarang</h5>
                    <p class="card-text text-muted">Jadwalkan potong rambutmu dengan barber favoritmu.</p>
                    <!-- This button correctly points to your existing 'booking' route -->
                    <a href="booking" class="btn btn-primary mt-auto">
                       <i class="bi bi-scissors me-1"></i> Buat Jadwal
                    </a>
                </div>
            </div>
        </div>

        <!-- Card 2: Riwayat Booking (Placeholder) -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body p-4 d-flex flex-column">
                    <div class="mb-3">
                        <i class="bi bi-clock-history card-icon text-success"></i>
                    </div>
                    <h5 class="card-title">Riwayat Booking</h5>
                    <p class="card-text text-muted">Lihat semua jadwal potong rambut yang sudah selesai.</p>
                    <!-- This is a placeholder link; it won't go anywhere yet -->
                    <a href="#" class="btn btn-outline-secondary mt-auto">
                        <a href="/beranda" class="btn btn-primary"> Lihat Riwayat
                    </a>
                </div>
            </div>
        </div>

        <!-- Card 3: Profil Saya (Placeholder) -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body p-4 d-flex flex-column">
                    <div class="mb-3">
                        <i class="bi bi-person-circle card-icon text-info"></i>
                    </div>
                    <h5 class="card-title">Profil Saya</h5>
                    <p class="card-text text-muted">Perbarui info kontak dan preferensi gayamu.</p>
                     <!-- This is a placeholder link -->
                    <a href="#" class="btn btn-outline-secondary mt-auto">
                        <i class="bi bi-person-fill-gear me-1"></i> Kelola Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

 <section class="section-padding text-center bg-white">
        <div class="container">
            <h2 class="mb-5 fw-bold"><i class="bi bi-geo-alt-fill me-2"></i>Pilihan Barber Populer di sekitarmu</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="barber-card">
                        <img src="https://images.unsplash.com/photo-1599351431202-1811c4373413?q=80&w=1974&auto=format&fit=crop" alt="The Cut Garage">
                        <div class="p-4">
                            <h5 class="fw-bold">The Cut Garage</h5>
                            <p class="text-muted mb-2"><i class="bi bi-pin-map-fill me-1"></i> Jl. Sudirman No. 12</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold"><i class="bi bi-star-fill text-warning"></i> 4.8 (250+)</span>
                                <a href="#" class="btn btn-sm btn-outline-dark">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="barber-card">
                        <img src="https://images.unsplash.com/photo-1622288432454-2415b74c4424?q=80&w=1964&auto=format&fit=crop" alt="Gentlemen's Cut">
                        <div class="p-4">
                            <h5 class="fw-bold">Gentlemen's Cut</h5>
                            <p class="text-muted mb-2"><i class="bi bi-pin-map-fill me-1"></i> Jl. Merdeka No. 55</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold"><i class="bi bi-star-fill text-warning"></i> 4.9 (400+)</span>
                                <a href="#" class="btn btn-sm btn-outline-dark">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mx-auto">
                    <div class="barber-card">
                        <img src="https://images.unsplash.com/photo-1605497788044-5a32c7ba384b?q=80&w=1974&auto=format&fit=crop" alt="King's Barbershop">
                        <div class="p-4">
                            <h5 class="fw-bold">King's Barbershop</h5>
                            <p class="text-muted mb-2"><i class="bi bi-pin-map-fill me-1"></i> Jl. Dago No. 8</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold"><i class="bi bi-star-fill text-warning"></i> 4.7 (180+)</span>
                                <a href="#" class="btn btn-sm btn-outline-dark">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="/barber" class="btn btn-primary mt-4">Lihat Semua Barber</a>
        </div>
    </section>


<!-- Simple Footer -->
<footer class="text-center text-muted py-4 mt-auto">
    <div class="container">
        <p>&copy; 2025 Hayu Cukur. All Rights Reserved.</p>
    </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

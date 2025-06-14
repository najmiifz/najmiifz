<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hayu Cukur - Cukur Gampang & Kekinian</title>

    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#B22222">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">

    <style>

        body {
            background-color: #f8f9fa;
            font-family: 'Lato', sans-serif;
            color: #495057;
        }

        h1, h2, h3, h4, .navbar-brand, .btn {
            font-family: 'Poppins', sans-serif;
        }

        /* 2. Navbar */
        .navbar-brand img {
            height: 45px;
        }

        .hero {
            background: url('https://images.unsplash.com/photo-1621607512214-6c34946b3ed6?q=80&w=2070&auto=format&fit=crop') no-repeat center center;
            background-size: cover;
            min-height: 90vh;
            color: white;
            position: relative;
        }

        .hero-overlay {
            /* Gradien halus untuk kontras teks yang lebih baik */
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0.4) 100%);
            position: absolute;
            inset: 0; /* Cara modern untuk top:0, left:0, right:0, bottom:0 */
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            padding: 20px;
        }

        .hero .display-4 {
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5); /* Bayangan teks agar terbaca jelas */
        }

        /* 4. Utilitas & Komponen Kustom */
        .section-padding {
            padding: 80px 20px;
        }

        .feature-card {
            background: #ffffff;
            border: none;
            border-radius: 15px;
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.07);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }

        .feature-icon {
            font-size: 3rem;
            color: #B22222;
            margin-bottom: 1.5rem;
            display: inline-block;
        }

        .barber-card {
            background: #ffffff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.07);
            transition: transform 0.3s ease;
            text-align: left;
            height: 100%;
        }

        .barber-card:hover {
            transform: translateY(-5px);
        }

        .barber-card img {
            height: 220px;
            object-fit: cover;
            width: 100%;
        }

        /* 5. Seksi Spesifik */
        .partner-section {
            background-color: #2c3e50; /* Warna biru gelap yang elegan */
            color: white;
        }

        /* 6. Tombol */
        .btn-primary {
            background-color: #B22222; /* Warna merah bata, lebih elegan dari #ff0000 */
            border-color: #B22222;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 50px; /* Tombol dengan sudut membulat modern */
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #9f1f1f;
            border-color: #9f1f1f;
            transform: scale(1.05); /* Efek membesar saat hover */
        }

        /* 7. Footer */
        .footer {
            background-color: #1c1c1c;
            color: #a0a0a0;
            padding: 60px 20px 20px;
        }
        .footer h5 {
            color: #ffffff;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        .footer a {
            color: #a0a0a0;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer a:hover {
            color: #ffffff;
            text-decoration: underline;
        }
        .footer .social-icons a {
            font-size: 1.5rem;
            margin-right: 15px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="https://placehold.co/100x100/B22222/white?text=HC" alt="Logo Hayu Cukur" class="me-2 rounded-circle">
                <span class="fw-bold fs-5">HayuCukur</span>
            </a>
            <div class="ms-auto">
                <a href="/pilih-akun-pelanggan" class="btn btn-primary">Booking sekarang</a>
            </div>
        </div>
    </nav>

    @if(session('success'))
    <div class="container mt-4">
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <header class="hero">
        <div class="hero-overlay">
            <h1 class="display-4 mb-3">Gaya Rambut Keren Tanpa Antre</h1>
            <p class="lead fs-4 mb-4">Temukan dan booking barbershop terbaik di sekitarmu dengan mudah.</p>
            <a href="/pilih-akun-pelanggan" class="btn btn-primary btn-lg">Booking Sekarang</a>
        </div>
    </header>

    <section class="section-padding text-center">
        <div class="container">
            <h2 class="mb-3 fw-bold">Kenapa Pilih HayuCukur?</h2>
            <p class="lead mb-5">Kami memberikan kemudahan untuk setiap helai rambutmu.</p>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card">
                        <i class="bi bi-calendar2-check feature-icon"></i>
                        <h4 class="fw-bold mb-3">Booking Mudah</h4>
                        <p>Pilih jadwal, kapster, dan layanan sesuai keinginanmu hanya dalam beberapa klik.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card">
                        <i class="bi bi-scissors feature-icon"></i>
                        <h4 class="fw-bold mb-3">Banyak Pilihan</h4>
                        <p>Temukan beragam barbershop dengan layanan dari potong rambut, jenggot, hingga creambath.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mx-auto">
                    <div class="feature-card">
                        <i class="bi bi-qr-code-scan feature-icon"></i>
                        <h4 class="fw-bold mb-3">Bayar Praktis</h4>
                        <p>Pembayaran aman dan cepat di lokasi atau langsung dari aplikasi menggunakan QRIS.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <section class="section-padding partner-section text-center">
        <div class="container">
            <h2 class="display-5 fw-bold mb-3">Punya Barbershop?</h2>
            <p class="lead mb-4 col-md-8 mx-auto">Tingkatkan jangkauan pelanggan dan kelola jadwal barbershop Anda dengan lebih efisien bersama kami.</p>
            <a href="/pilih-akun-mitra" class="btn btn-light btn-lg">Daftar Sebagai Mitra</a>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <h5>HayuCukur</h5>
                    <p>Platform booking barbershop terdepan untuk gaya rambut modern tanpa ribet. Booking, datang, dan tampil keren.</p>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h5>Navigasi</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Beranda</a></li>
                        <li class="mb-2"><a href="/booking">Booking</a></li>
                        <li class="mb-2"><a href="/barbers">Pilihan Barber</a></li>
                        <li><a href="/login">Login</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5>Untuk Mitra</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/pilih-akun-mitra">Daftar Jadi Mitra</a></li>
                        <li class="mb-2"><a href="#">Login Mitra</a></li>
                        <li><a href="#">Pusat Bantuan Mitra</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Ikuti Kami</h5>
                    <div class="social-icons">
                        <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4" style="border-color: #333;">
            <div class="text-center">
                <p>&copy; 2025 HayuCukur. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

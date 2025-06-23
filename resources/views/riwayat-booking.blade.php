<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Riwayat Booking - Hayu Cukur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #fffef8;
      font-family: 'Segoe UI', sans-serif;
    }

    .navbar {
      background-color: #fff;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .navbar-brand {
      font-weight: bold;
      color: #1a252f;
    }

    .btn-login {
      background-color: #dc3545;
      color: #fff;
      border-radius: 25px;
      padding: 6px 16px;
      font-weight: 500;
    }

    .btn-login:hover {
      background-color: #bb2d3b;
      color: #fff;
    }

    .hero-title {
      font-family: 'Arial Black', sans-serif;
      font-size: 2.4rem;
      color: #d62828;
      margin-bottom: 0;
    }

    .subtext {
      font-size: 1rem;
      color: #4a4a4a;
    }

    .card-booking {
      background-color: #fff;
      border: 1px solid #eee;
      border-radius: 16px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
      transition: all 0.2s ease-in-out;
    }

    .card-booking:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0,0,0,0.08);
    }

    .booking-detail {
      font-size: 0.95rem;
      color: #555;
    }

    .status {
      font-size: 0.9rem;
      font-weight: 600;
      padding: 4px 10px;
      border-radius: 12px;
    }

    .status-selesai {
      background-color: #d1e7dd;
      color: #0f5132;
    }

    .status-proses {
      background-color: #fff3cd;
      color: #664d03;
    }

    .status-batal {
      background-color: #f8d7da;
      color: #842029;
    }

    .section-title {
      font-weight: bold;
      font-size: 1.8rem;
      margin-bottom: 1rem;
      color: #1a252f;
    }

    .btn-outline-danger {
      border-radius: 20px;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light px-4 py-3">
  <a class="navbar-brand d-flex align-items-center" href="/beranda">
    <img src="/images/logo.png" alt="Hayu Cukur" style="height: 36px;" class="me-2">
    Hayu Cukur
  </a>
  <div class="ms-auto">
    <a href="/logout" class="btn btn-login">Logout</a>
  </div>
</nav>

<!-- Hero / Title -->
<section class="container text-center my-5">
  <h1 class="hero-title">Riwayat Booking Kamu</h1>
  <p class="subtext">Lihat semua potongan yang pernah kamu booking, kapan aja, di mana aja.</p>
</section>

<!-- Riwayat Booking Cards -->
<section class="container mb-5">
  <div class="row g-4">

    <!-- Card 1 -->
    <div class="col-md-6 col-lg-4">
      <div class="card-booking">
        <h5 class="fw-bold">Gentleman's Cut - Barber Bro</h5>
        <p class="booking-detail mb-1">Tanggal: 15 Juni 2025</p>
        <p class="booking-detail mb-1">Jam: 14:00 WIB</p>
        <p class="booking-detail mb-1">Harga: Rp25.000</p>
        <span class="status status-selesai">Selesai</span>
        <div class="text-end mt-2">
          <a href="/riwayat/detail/1" class="btn btn-sm btn-outline-danger rounded-pill">Lihat Detail</a>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-md-6 col-lg-4">
      <div class="card-booking">
        <h5 class="fw-bold">Fade Haircut - Cukur Mas Bro</h5>
        <p class="booking-detail mb-1">Tanggal: 13 Juni 2025</p>
        <p class="booking-detail mb-1">Jam: 10:30 WIB</p>
        <p class="booking-detail mb-1">Harga: Rp20.000</p>
        <span class="status status-proses">Diproses</span>
        <div class="text-end mt-2">
          <a href="/riwayat/detail/2" class="btn btn-sm btn-outline-danger rounded-pill">Lihat Detail</a>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col-md-6 col-lg-4">
      <div class="card-booking">
        <h5 class="fw-bold">Cukur Anak - Barbershop KidsZone</h5>
        <p class="booking-detail mb-1">Tanggal: 10 Juni 2025</p>
        <p class="booking-detail mb-1">Jam: 16:00 WIB</p>
        <p class="booking-detail mb-1">Harga: Rp15.000</p>
        <span class="status status-batal">Dibatalkan</span>
        <div class="text-end mt-2">
          <a href="/riwayat/detail/3" class="btn btn-sm btn-outline-danger rounded-pill">Lihat Detail</a>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- Footer -->
<footer class="text-center text-muted py-4">
  <div class="container">
    <p>&copy; 2025 Hayu Cukur. All Rights Reserved.</p>
  </div>
</footer>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Mitra - Hayu Cukur</title>
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

    .btn-logout {
      background-color: #dc3545;
      color: #fff;
      border-radius: 25px;
      padding: 6px 16px;
      font-weight: 500;
    }

    .section-title {
      font-weight: bold;
      font-size: 1.8rem;
      margin-bottom: 1rem;
      color: #1a252f;
    }

    .dashboard-card {
      border-radius: 16px;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #eee;
      box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }

    .dashboard-card .btn {
      border-radius: 20px;
    }

    .card-icon {
      font-size: 2rem;
      margin-bottom: 10px;
      color: #d62828;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light px-4 py-3">
  <a class="navbar-brand" href="/mitra/dashboard">
    Hayu Cukur - Mitra
  </a>
  <div class="ms-auto">
    <a href="/logout" class="btn btn-logout">Logout</a>
  </div>
</nav>

<!-- Dashboard -->
<div class="container my-5">
  <h2 class="section-title text-center">Dashboard Mitra</h2>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="dashboard-card text-center">
        <div class="card-icon">
          <i class="bi bi-calendar-check"></i>
        </div>
        <h5>Total Booking</h5>
        <p class="text-muted">12 Booking</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="dashboard-card text-center">
        <div class="card-icon">
          <i class="bi bi-bar-chart-line"></i>
        </div>
        <h5>Selesai</h5>
        <p class="text-muted">9 Booking</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="dashboard-card text-center">
        <div class="card-icon">
          <i class="bi bi-scissors"></i>
        </div>
        <h5>Kelola Barbershop</h5>
        <a href="/mitra/barbershop" class="btn btn-outline-dark mt-2">Edit Info</a>
      </div>
    </div>
  </div>

  <!-- Booking Hari Ini -->
  <div class="mt-5">
    <h4 class="fw-bold mb-3">Booking Hari Ini</h4>
    <div class="dashboard-card">
      <p class="mb-1"><strong>Nama:</strong> Rofi A. Taufik</p>
      <p class="mb-1"><strong>Layanan:</strong> Fade Haircut</p>
      <p class="mb-3"><strong>Jam:</strong> 14:00 WIB</p>
      <a href="/mitra/booking/1" class="btn btn-outline-danger btn-sm">Detail</a>
      <a href="#" class="btn btn-success btn-sm">Selesai</a>
      <a href="#" class="btn btn-secondary btn-sm">Batal</a>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="text-center text-muted py-4">
  <p>&copy; 2025 Hayu Cukur. All Rights Reserved.</p>
</footer>

</body>
</html>

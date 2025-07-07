<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Bookingan Pelanggan - Mitra Hayu Cukur</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap + Icons -->
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

    .table-container {
      background-color: white;
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    th {
      background-color: #B22222;
      color: white;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h4><img src="images/logocukur.png" alt="Logo">Mitra HayuCukur</h4>
    <a href="/dashboard-mitra"><i class="bi bi-house-door-fill"></i> Dashboard</a>
    <a href="/booking-mitra"><i class="bi bi-calendar-check-fill"></i> Bookingan Pelanggan</a>
    <a href="/kelola-barber-mitra"><i class="bi bi-scissors"></i> Kelola Barbershop</a>
    <a href="/logout"><i class="bi bi-box-arrow-right"></i> Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <h2><i class="bi bi-calendar-check-fill"></i> Bookingan Pelanggan</h2>
    <p class="text-muted">Berikut adalah daftar pelanggan yang telah melakukan booking di barbershop Anda.</p>

    <div class="table-container mt-4">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Booking</th>
            <th>Jam</th>
            <th>Layanan</th>
            <th>Status</th>
            <th>Pembayaran</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Aldi Pratama</td>
            <td>03 Juli 2025</td>
            <td>14:00</td>
            <td>Potong Rambut</td>
            <td><span class="badge bg-warning">Menunggu</span></td>
            <td><span class="badge bg-info text-dark">Transfer QRIS</span></td>
            <td><a href="/detail-booking-mitra" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye-fill"></i> Detail</a></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Budi Santoso</td>
            <td>03 Juli 2025</td>
            <td>15:00</td>
            <td>Cukur Kumis</td>
            <td><span class="badge bg-success">Selesai</span></td>
            <td><span class="badge bg-secondary">Bayar di Tempat</span></td>
            <td><a href="/detail-booking-mitra" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye-fill"></i> Detail</a></td>
          </tr>
          <tr>
            <td>3</td>
            <td>Chika Dewi</td>
            <td>04 Juli 2025</td>
            <td>10:00</td>
            <td>Potong & Cuci</td>
            <td><span class="badge bg-danger">Dibatalkan</span></td>
            <td><span class="badge bg-secondary">Bayar di Tempat</span></td>
            <td><a href="/detail-booking-mitra" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye-fill"></i> Detail</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>

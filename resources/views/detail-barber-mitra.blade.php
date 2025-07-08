<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Barbershop Tersimpan - Mitra Hayu Cukur</title>
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
    .content-box {
      background-color: white;
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    .section-title {
      font-weight: bold;
      margin-top: 2rem;
      margin-bottom: 1rem;
    }
    .info-label {
      font-weight: 600;
      color: #555;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h4><img src="/images/logocukur.png" alt="Logo">Mitra HayuCukur</h4>
    <a href="#"><i class="bi bi-house-door-fill"></i> Dashboard</a>
    <a href="#"><i class="bi bi-calendar-check-fill"></i> Bookingan Pelanggan</a>
    <a href="#"><i class="bi bi-scissors"></i> Kelola Barbershop</a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right"></i> Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="content-box">
      <h4 class="text-success"><i class="bi bi-check-circle-fill"></i> Barbershop Berhasil Disimpan!</h4>
      <p class="text-muted">Berikut adalah detail barbershop Anda:</p>

      <!-- Foto Barbershop di Atas -->
      <div class="text-center mt-3 mb-4">
        <img src="/uploads/barberganteng.jpg" alt="Foto Barbershop" class="img-fluid rounded shadow-sm" style="max-width: 350px;">
      </div>

      <!-- Info Barbershop -->
      <div>
        <p><span class="info-label">Nama Barbershop:</span> Barber Ganteng</p>
        <p><span class="info-label">Alamat:</span> Jl. Sukajadi No.123, Bandung</p>
        <p><span class="info-label">Kota:</span> Bandung</p>
        <p><span class="info-label">Jam Operasional:</span> 09:00 - 20:00</p>
        <p><span class="info-label">Deskripsi:</span> Barbershop kekinian dengan suasana nyaman, pelayanan profesional, dan hasil potongan yang memuaskan pelanggan dari segala usia.</p>
      </div>

      <!-- Layanan -->
      <h5 class="section-title">Layanan Tersedia</h5>
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Cukur Rambut
          <span>Rp25.000 / 30 menit</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Hairstyling
          <span>Rp30.000 / 40 menit</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Creambath
          <span>Rp35.000 / 45 menit</span>
        </li>
      </ul>

      <!-- Tombol Aksi -->
      <div class="mt-4">
        <a href="#" class="btn btn-outline-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
        <a href="#" class="btn btn-danger"><i class="bi bi-pencil-square"></i> Edit Barbershop</a>
      </div>
    </div>
  </div>

</body>
</html>

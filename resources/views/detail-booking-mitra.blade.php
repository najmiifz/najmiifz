<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Booking - Mitra Hayu Cukur</title>
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

    .card-detail {
      background-color: white;
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    .btn-status {
      margin-right: 10px;
      margin-bottom: 10px;
    }

    .btn-waiting {
      background-color: #ffc107;
      color: black;
    }

    .btn-process {
      background-color: #17a2b8;
      color: white;
    }

    .btn-success {
      background-color: #28a745;
      color: white;
    }

    .btn-danger {
      background-color: #dc3545;
      color: white;
    }

    .btn-status.active {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      transform: scale(1.05);
    }

    .current-status {
      font-size: 1.1rem;
      margin-bottom: 1.5rem;
    }

    .btn-simpan {
      margin-top: 2rem;
    }
  </style>

  <script>
    let currentStatus = "menunggu";

    function updateCurrentStatus(status) {
      currentStatus = status;

      document.getElementById("status-text").textContent = status.charAt(0).toUpperCase() + status.slice(1);

      // Reset all buttons
      document.querySelectorAll('.btn-status').forEach(btn => btn.classList.remove('active'));
      document.getElementById(`btn-${status}`).classList.add('active');
    }

    function simpanStatus() {
      alert("Status booking berhasil diubah menjadi: " + currentStatus.charAt(0).toUpperCase() + currentStatus.slice(1));
      // Kirim ke backend dengan AJAX / form submission nanti
    }
  </script>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h4><img src="/images/logocukur.png" alt="Logo">Mitra HayuCukur</h4>
    <a href="/dashboard-mitra"><i class="bi bi-house-door-fill"></i> Dashboard</a>
    <a href="/booking-mitra"><i class="bi bi-calendar-check-fill"></i> Bookingan Pelanggan</a>
    <a href="/kelola-barber-mitra"><i class="bi bi-scissors"></i> Kelola Barbershop</a>
    <a href="{{ route("logout") }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="bi bi-box-arrow-right"></i> Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <h2><i class="bi bi-person-lines-fill"></i> Detail Booking</h2>
    <p class="text-muted">Informasi lengkap tentang booking pelanggan.</p>

    <div class="card-detail mt-4">
      <h5 class="fw-bold">Informasi Pelanggan</h5>
      <p><strong>Nama:</strong> Aldi Pratama</p>
      <p><strong>Tanggal Booking:</strong> 03 Juli 2025</p>
      <p><strong>Jam:</strong> 14:00</p>
      <p><strong>Layanan:</strong> Potong Rambut</p>
      <p><strong>Pembayaran:</strong> Transfer QRIS</p>

      <hr>

      <!-- Status Aktif -->
      <div class="current-status">
        <strong>Status Saat Ini:</strong> <span id="status-text" class="badge bg-warning text-dark">Menunggu</span>
      </div>

      <!-- Tombol Ubah Status -->
      <div class="d-flex flex-wrap">
        <button id="btn-menunggu" class="btn btn-waiting btn-status active" onclick="updateCurrentStatus('menunggu')">
          <i class="bi bi-hourglass-split me-1"></i> Menunggu
        </button>
        <button id="btn-diproses" class="btn btn-process btn-status" onclick="updateCurrentStatus('diproses')">
          <i class="bi bi-tools me-1"></i> Diproses
        </button>
        <button id="btn-selesai" class="btn btn-success btn-status" onclick="updateCurrentStatus('selesai')">
          <i class="bi bi-check2-circle me-1"></i> Selesai
        </button>
        <button id="btn-dibatalkan" class="btn btn-danger btn-status" onclick="updateCurrentStatus('dibatalkan')">
          <i class="bi bi-x-circle me-1"></i> Dibatalkan
        </button>
      </div>

      <!-- Tombol Simpan -->
      <button class="btn btn-primary btn-simpan" onclick="simpanStatus()">
        <i class="bi bi-save me-1"></i> Simpan Perubahan
      </button>
    </div>
  </div>

</body>
</html>

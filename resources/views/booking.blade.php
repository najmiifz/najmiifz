<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Booking - Hayu Cukur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Inter', sans-serif;
    }
    .navbar {
      background-color: white;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }
    .navbar-brand strong {
      color: #B22222;
    }
    .nav-link {
      color: #333;
      font-weight: 500;
    }
    .nav-link:hover {
      color: #B22222;
    }
    .step-progress {
      display: flex;
      justify-content: center;
      gap: 50px;
      margin: 20px 0;
    }
    .step-progress div {
      font-weight: 600;
      color: gray;
    }
    .step-progress .active {
      color: #B22222;
    }
    .card {
      border-radius: 15px;
      border: none;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    .btn-next {
      background-color: #B22222;
      color: white;
      width: 100%;
      padding: 12px;
      font-weight: 600;
      border-radius: 50px;
    }
    .btn-next:hover {
      background-color: #9f1f1f;
    }
    .form-check-label {
      font-weight: 500;
    }
    .price {
      color: #B22222;
      font-weight: 600;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="/dashboard">
      <img src="https://placehold.co/150x40/B22222/ffffff?text=Hayu+Cukur&font=raleway" alt="Logo" height="40" class="me-2 rounded" />
      <strong>Hayu Cukur</strong>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item">
          <a class="nav-link" href="/dashboard"><i class="bi bi-house-door-fill me-1"></i>Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/booking"><i class="bi bi-calendar-check-fill me-1"></i>Booking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/riwayat"><i class="bi bi-clock-history me-1"></i>Riwayat</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle me-1"></i>
            <span id="userNameNavbar">{{ Auth::user()->name }}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="/profil">Profil</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Step Progress -->
<div class="step-progress">
  <div class="active">1. Info Pemesan</div>
  <div>2. Pembayaran</div>
  <div>3. Booking Berhasil</div>
</div>

<!-- Content -->
<div class="container mb-5">
  <div class="row g-4">
    <!-- Form -->
    <div class="col-lg-7">
      <div class="card p-4">
        <h4 class="mb-4">Siapa yang booking?</h4>
        <form>
          <div class="row g-3">
            <div class="col-md-6">
              <input type="text" class="form-control" placeholder="Nama Depan *" required>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" placeholder="Nama Belakang *" required>
            </div>
          </div>
          <div class="mt-3">
            <input type="email" class="form-control" placeholder="Email *" required>
          </div>
          <div class="mt-3">
            <input type="text" class="form-control" placeholder="Nomor HP (opsional)">
          </div>

          <hr class="my-4">

          <div class="mb-3">
            <label class="form-label">Pilih Barbershop</label>
            <select class="form-select">
              <option selected>The Cut Garage</option>
              <option>Barber Bros</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Pilih Layanan</label>
            <div class="form-check">
              <input class="form-check-input layanan" type="checkbox" value="50000" id="layanan1">
              <label class="form-check-label" for="layanan1">
                Potong Rambut <span class="price">Rp 50.000</span>
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input layanan" type="checkbox" value="30000" id="layanan2">
              <label class="form-check-label" for="layanan2">
                Cukur Jenggot <span class="price">Rp 30.000</span>
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input layanan" type="checkbox" value="40000" id="layanan3">
              <label class="form-check-label" for="layanan3">
                Creambath <span class="price">Rp 40.000</span>
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input layanan" type="checkbox" value="150000" id="layanan4">
              <label class="form-check-label" for="layanan4">
                Hair Coloring <span class="price">Rp 150.000</span>
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input layanan" type="checkbox" value="70000" id="layanan5">
              <label class="form-check-label" for="layanan5">
                Facial <span class="price">Rp 70.000</span>
              </label>
            </div>

            <!-- Total Harga -->
            <div class="mt-3">
              <h6>Total Harga: <span id="totalHarga" class="price">Rp 0</span></h6>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <label class="form-label">Tanggal</label>
              <input type="date" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Jam</label>
              <input type="time" class="form-control" required>
            </div>
          </div>

          <div class="mt-3">
            <label class="form-label">Catatan (Opsional)</label>
            <textarea class="form-control" rows="3"></textarea>
          </div>
        </form>
      </div>
    </div>

    <!-- Detail Booking -->
    <div class="col-lg-5">
      <div class="card p-4">
        <h5>Detail Booking</h5>
        <div class="d-flex align-items-center gap-3">
          <img src="https://placehold.co/100x100" class="rounded" alt="">
          <div>
            <h6 class="mb-0">The Cut Garage</h6>
            <small>Jl. Sudirman No.123, Jakarta</small>
          </div>
        </div>
        <hr>
        <p class="mb-1">Layanan: <strong><span id="layananTerpilih">-</span></strong></p>
        <p class="mb-1">Tanggal: <strong>03 Juli 2025</strong></p>
        <p class="mb-1">Jam: <strong>10:00 WIB</strong></p>
        <p class="mb-1">Total Harga: <strong><span id="totalHargaDetail">Rp 0</span></strong></p>
        <hr>
        <p class="text-danger mb-0">⚠️ Slot terbatas, segera konfirmasi!</p>
      </div>
    </div>
  </div>

  <!-- Tombol -->
  <div class="mt-4">
  <a href="/pembayaran" class="btn btn-next">
    <i class="bi bi-check-circle me-1"></i> NEXT: FINAL STEP
  </a>
</div>


<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const checkboxes = document.querySelectorAll('.layanan');
  const totalHarga = document.getElementById('totalHarga');
  const totalHargaDetail = document.getElementById('totalHargaDetail');
  const layananTerpilih = document.getElementById('layananTerpilih');

  checkboxes.forEach(item => {
    item.addEventListener('change', () => {
      let total = 0;
      let layananList = [];

      checkboxes.forEach(c => {
        if (c.checked) {
          total += parseInt(c.value);
          const label = c.nextElementSibling.innerText.split('Rp')[0].trim();
          layananList.push(label);
        }
      });

      totalHarga.innerText = 'Rp ' + total.toLocaleString('id-ID');
      totalHargaDetail.innerText = 'Rp ' + total.toLocaleString('id-ID');
      layananTerpilih.innerText = layananList.length > 0 ? layananList.join(', ') : '-';
    });
  });
</script>
</body>
</html>

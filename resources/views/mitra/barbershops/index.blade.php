<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Semua Barbershop - HayuCukur</title>
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
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

    <!-- Sidebar -->
  <div class="sidebar">
    <h4><img src="/images/logocukur.png" alt="Logo">Mitra HayuCukur</h4>
    <a href="{{ route('dashboard.mitra') }}"><i class="bi bi-house-door-fill"></i> Dashboard</a>
    <a href="{{ route('mitra.bookings.index') }}"><i class="bi bi-calendar-check-fill"></i> Bookingan Pelanggan</a>
    <a href="{{ route('mitra.barbershops.index') }}"><i class="bi bi-scissors"></i> Kelola Barbershop</a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="bi bi-box-arrow-right"></i> Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>

  <div class="main-content">
    <div class="d-flex justify-content-between align-items-center">
      <h4><i class="bi bi-scissors"></i> Kelola Semua Barbershop Anda</h4>
      <a href="{{ route('mitra.barbershop.create') }}" class="btn btn-danger">
        <i class="bi bi-plus-circle-fill"></i> Tambah Barbershop Baru
      </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <div class="table-container mt-4">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nama Barbershop</th>
            <th>Lokasi</th>
            <th class="text-end">Aksi</th>
          </tr>
        </thead>
        <tbody>
          {{-- **FIXED:** The loop now reliably uses the '$barbershops' variable from the controller. --}}
          @forelse ($barbershops as $barbershop)
            <tr>
              <td>{{ $barbershop->name }}</td>
              <td>{{ $barbershop->location }}</td>
              <td class="text-end">
                <a href="{{ route('mitra.barbershop.edit', $barbershop->id) }}" class="btn btn-sm btn-dark">Edit</a>

                <form action="{{ route('mitra.barbershop.destroy', $barbershop->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barbershop ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="text-center p-4">Anda belum menambahkan barbershop.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>

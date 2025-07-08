<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Bookingan Pelanggan - Mitra Hayu Cukur</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
      background-color: #343a40;
      color: white;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h4><img src="/images/logocukur.png" alt="Logo">Mitra HayuCukur</h4>
    <a href="{{ route('dashboard.mitra') }}"><i class="bi bi-house-door-fill"></i> Dashboard</a>
    <a href="{{ route('mitra.bookings.index') }}"><i class="bi bi-calendar-check-fill"></i> Bookingan Pelanggan</a>
    @if(Auth::user()->barbershop)
        <a href="{{ route('mitra.barbershop.edit', Auth::user()->barbershop->id) }}"><i class="bi bi-scissors"></i> Kelola Barbershop</a>
    @else
        <a href="{{ route('mitra.barbershop.create') }}"><i class="bi bi-scissors"></i> Kelola Barbershop</a>
    @endif
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="bi bi-box-arrow-right"></i> Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>

  <div class="main-content">
    <h2><i class="bi bi-calendar-check-fill"></i> Bookingan Pelanggan</h2>
    <p class="text-muted">Berikut adalah daftar pelanggan yang telah melakukan booking di barbershop Anda.</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-container mt-4">
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th>Nama Pelanggan</th>
            <th>Tanggal & Waktu</th>
            <th>Status Saat Ini</th>
            <th width="30%">Ubah Status</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($bookings as $booking)
            <tr>
              <td>{{ $booking->user->name ?? 'Pelanggan Dihapus' }}</td>
              <td>{{ \Carbon\Carbon::parse($booking->booking_time)->format('d F Y, H:i') }}</td>
              <td>
                <span class="badge
                    @if($booking->status == 'Selesai') bg-success
                    @elseif($booking->status == 'Diproses') bg-info text-dark
                    @elseif($booking->status == 'Dibatalkan') bg-danger
                    @else bg-warning text-dark @endif">
                    {{ $booking->status }}
                </span>
              </td>
              <td>
                <form action="{{ route('mitra.bookings.status.update', $booking->id) }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <select name="status" class="form-select">
                            <option value="Menunggu" @if($booking->status == 'Menunggu') selected @endif>Menunggu</option>
                            <option value="Diproses" @if($booking->status == 'Diproses') selected @endif>Diproses</option>
                            <option value="Selesai" @if($booking->status == 'Selesai') selected @endif>Selesai</option>
                            <option value="Dibatalkan" @if($booking->status == 'Dibatalkan') selected @endif>Dibatalkan</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-dark">Update</button>
                    </div>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-center p-4">Belum ada data bookingan.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>

@extends('layouts.mitra')

@section('title', 'Kelola Barbershop')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0"><i class="bi bi-scissors me-2"></i>Kelola Barbershop Anda</h2>
        <a href="{{ route('mitra.barbershop.create') }}" class="btn btn-gold">
            <i class="bi bi-plus-circle-fill me-1"></i> Tambah Barbershop
        </a>
    </div>

    <div class="card mt-4" style="background-color: #1c1c1c; border-color: #333;">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Nama Barbershop</th>
                            <th>Lokasi</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($barbershops as $barbershop)
                            <tr>
                                <td>{{ $barbershop->name }}</td>
                                <td>{{ $barbershop->location }}</td>
                                <td class="text-end">
                                    <a href="{{ route('mitra.barbershop.edit', $barbershop->id) }}" class="btn btn-sm btn-gold">Edit</a>
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
    </div>
@endsection

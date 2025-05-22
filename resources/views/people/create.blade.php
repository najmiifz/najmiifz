@extends('layouts.main')

@section('main-content')
    <h1>Form Input</h1>
    <form action="{{ route('person.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">NIK</label>
            <input type="number" class="form-control" name="code">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" name="name">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection
@extends('layouts.main')

@section('main-content')
    <div class="alert alert-success" role="alert">
        <p>Selamat !!! <strong>{{ $person->name }}</strong> anda telah terdaftar dengan NIK
            <i>{{ $person->code }}</i></p>
    </div>
@endsection

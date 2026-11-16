@extends('layouts.master')

@section('content')
	<div class="container mt-3">
		<h1>Selamat Datang di Halaman Beranda</h1>
        <div class="card">
            <div class="card-body">
                Selamat datang {{ $nama }}, dari kelas {{ $kelas }} dengan nim {{ $nim }}
            </div>
	</div>
@endsection

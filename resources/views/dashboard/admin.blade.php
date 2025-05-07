@extends('layouts.app')

@section('content')
    <h1>Selamat Datang, Admin {{ auth()->user()->name }} 👋</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Ruangan</h5>
                    <p class="card-text">{{ $totalRuangan }}</p> <!-- Menampilkan total ruangan -->
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Ketersediaan Ruangan</h5>
                    <p class="card-text">{{ $ruanganTersedia }}</p> <!-- Menampilkan total ketersediaan ruangan -->
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Ruangan Dipinjam</h5>
                    <p class="card-text">{{ $ruanganDipinjam }}</p> <!-- Menampilkan total ruangan dipinjam -->
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Peminjam Ruangan</h5>
                    <p class="card-text">Ini bingung untuk apa?</p>
                </div>
            </div>
        </div>
    </div>
@endsection

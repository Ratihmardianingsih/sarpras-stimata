@extends('layouts.app')

@section('content')
    <h1>Selamat Datang, Admin {{ auth()->user()->name }} 👋</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Ruangan</h5>
                    <!-- Menampilkan total ruangan -->
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Ketersediaan Ruangan</h5>
                    </p> <!-- Data ketersediaan ruangan -->
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Ruangan Dipinjam</h5>
                  </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informasi</h5>
                    <p class="card-text">Ini bingung untuk apa?</p>
                </div>
            </div>
        </div>
    </div>
@endsection

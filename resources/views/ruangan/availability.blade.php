@extends('layouts.app')

@section('content')
    <h1>Ketersediaan Ruangan</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Ruangan</th>
                <th>Kapasitas</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruangans as $ruangan)
                <tr>
                    <td>{{ $ruangan->nama }}</td>
                    <td>{{ $ruangan->kapasitas }}</td>
                    <td>{{ $ruangan->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

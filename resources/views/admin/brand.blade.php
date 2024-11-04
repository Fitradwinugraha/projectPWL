@extends('layouts.admin')

@section('sidebar')
<div id="sidebar" class="d-flex flex-column p-3">
    <h3>
        <img src="{{ asset('assets/img/logos.png') }}" alt="Dashboard Icon" style="width: 165px; height: 45px; margin-right: 8px; vertical-align: middle;">
    </h3>
    <p>Admin</p>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <img src="{{ asset('assets/img/dashboard.png') }}" alt="Dashboard Icon" style="width: 18px; height: 18px; margin-right: 8px; vertical-align: middle;">
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <img src="{{ asset('assets/img/user.png') }}" alt="User Icon" style="width: 18px; height: 18px; margin-right: 8px; vertical-align: middle;">
                Kelola Akun
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.motor') }}" class="nav-link">
                <img src="{{ asset('assets/img/motorcycle.png') }}" alt="Motor Icon" style="width: 18px; height: 18px; margin-right: 8px; vertical-align: middle;">
                Motor
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.brand') }}" class="nav-link">
                <img src="{{ asset('assets/img/vespa.png') }}" alt="Motor Icon" style="width: 18px; height: 18px; margin-right: 8px; vertical-align: middle;">
                Brand Motor
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <img src="{{ asset('assets/img/invoice.png') }}" alt="Invoice Icon" style="width: 18px; height: 18px; margin-right: 8px; vertical-align: middle;">
                Transaksi
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <img src="{{ asset('assets/img/logout.png') }}" alt="Logout Icon" style="width: 18px; height: 18px; margin-right: 8px; vertical-align: middle;">
                Logout
            </a>
        </li>
    </ul>
</div>
@endsection

@section('content')
<div class="brand-table-container p-4 shadow-sm">
    <h4>Daftar Brand Motor</h4>
    <a href="{{ route('admin.tambahmerek') }}" class="btn btn-primary mb-3">Tambah Brand</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Brand</th>
                <th>Tahun Pembuatan</th>
                <th>Jenis Motor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mereks as $index => $merek)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $merek->merek_motor }}</td>
                    <td>{{ $merek->tahun_pembuatan }}</td>
                    <td>{{ $merek->jenis_motor }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

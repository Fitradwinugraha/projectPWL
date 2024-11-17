@extends('layouts.admin')

@section('sidebar')
<div id="sidebar" class="d-flex flex-column p-3">
    <h3><img src="{{ asset('assets/img/logos.png') }}" alt="Dashboard Icon" style="width: 165px; height: 45px; margin-right: 8px; vertical-align: middle;"></h3>
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
            <a href="#" class="nav-link">
                <img src="{{ asset('assets/img/invoice.png') }}" alt="Invoice Icon" style="width: 18px; height: 18px; margin-right: 8px; vertical-align: middle;">
                Transaksi
            </a>
        </li>
        
        <li class="nav-item2">
        <a href="#" class="nav-link">
                <img src="{{ asset('assets/img/logout.png') }}" alt="Logout Icon" style="width: 18px; height: 18px; margin-right: 8px; vertical-align: middle;">
                Logout
            </a>
        </li>
    </ul>
</div>
@endsection

@section('content')
<div class="motor-table-container p-10 shadow-sm">
    <h4>Daftar Transaksi</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penyewa</th>
                <th>Nomor Identitas</th> 
                <th>Nomor Telepon</th> 
                <th>Email</th>
                <th>Foto KTP</th>
                <th>Tanggal Sewa</th>
                <th>Tanggal Pengembalian</th>
                <th>Total Harga</th>
                <th>Metode Pembayaran</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>
</div>
@endsection

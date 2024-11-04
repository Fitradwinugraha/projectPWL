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
                <a href="" class="nav-link">
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
<div class="container">
    <div class="form-container">
        <form action="{{ route('admin.storemerek') }}" method="POST">
            @csrf
            <h4>Tambah Brand Motor</h4>
            <div class="mb-3">
                <label for="merek_motor" class="form-label">Nama Brand</label>
                <input type="text" class="form-control" id="merek_motor" name="merek_motor" required>
            </div>
            <div class="mb-3">
                <label for="tahun_pembuatan" class="form-label">Tahun Pembuatan</label>
                <input type="number" class="form-control" id="tahun_pembuatan" name="tahun_pembuatan" required>
            </div>
            <div class="mb-3">
                <label for="jenis_motor" class="form-label">Jenis Motor</label>
                <input type="text" class="form-control" id="jenis_motor" name="jenis_motor" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection

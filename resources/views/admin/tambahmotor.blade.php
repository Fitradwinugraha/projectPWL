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
            <a href="{{ route('admin.kelola-akun') }}" class="nav-link">
                <img src="{{ asset('assets/img/user.png') }}" alt="User Icon" style="width: 18px; height: 18px; margin-right: 8px; vertical-align: middle;">
                Costumer
            </a>
        </li>
        <li class="nav-item">
        <a href="{{ route('admin.motor') }}" class="nav-link">
                <img src="{{ asset('assets/img/motorcycle.png') }}" alt="Motor Icon" style="width: 18px; height: 18px; margin-right: 8px; vertical-align: middle;">
                Motor
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.transaksiadm') }}" class="nav-link">
                <img src="{{ asset('assets/img/invoice.png') }}" alt="Invoice Icon" style="width: 18px; height: 18px; margin-right: 8px; vertical-align: middle;">
                Transaksi
            </a>
        </li>
        <li class="nav-item2">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link">
                    <img src="{{ asset('assets/img/logout.png') }}" alt="Logout Icon" style="width: 18px; height: 18px; margin-right: 8px; vertical-align: middle;" alt="logout icon">
                    Logout
                </button>
            </form>
        </li>  
    </ul>
</div>
@endsection


@section('content')
<div class="container">
    <div class="form-container">
        <form action="{{ route('admin.storemotor') }}" method="POST" enctype="multipart/form-data">
            <h4>Tambah Motor</h4>
            @csrf
            <div class="mb-3">
                <label for="nama_motor" class="form-label">Nama Motor</label>
                <input type="text" class="form-control" id="nama_motor" name="nama_motor" required>
            </div>
            <div class="mb-3">
                <label for="merek_motor" class="form-label">Merek Motor</label>
                <input type="text" class="form-control" id="merek_motor" name="merek_motor" required>
            </div>
            <div class="mb-3">
                <label for="tahun_pembuatan" class="form-label">Tahun Pembuatan</label>
                <input type="number" class="form-control" id="tahun_pembuatan" name="tahun_pembuatan" required>
            </div>
            <div class="mb-3">
                <label for="nomor_polisi" class="form-label">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" required>
            </div>
            <div class="mb-3">
                <label for="foto_motor" class="form-label">Foto Motor</label>
                <input type="file" class="form-control" id="foto_motor" name="foto_motor" required>
            </div>
            <div class="mb-3">
                <label for="harga_sewa" class="form-label">Harga Sewa</label>
                <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" required>
            </div>
            <div class="mb-3">
                <label for="transmisi" class="form-label">Transmisi</label>
                <select class="form-select" id="transmisi" name="transmisi" required>
                    <option value="manual">Manual</option>
                    <option value="matic">Matic</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" cols="50" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection



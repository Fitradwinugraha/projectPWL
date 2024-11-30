@extends('layouts.admin')

@section('sidebar')
<div id="sidebar" class="d-flex flex-column p-3">
    <h3><img src="{{ asset('assets/img/logos.png') }}" alt="Dashboard Icon" style="width: 165px; height: 45px; margin-right: 8px; vertical-align: middle;"></h3>
    <p>Admin</p>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="#" class="nav-link">
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
        <form action="{{ route('admin.updatemotor', $motor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h4>Edit Motor</h4>
            
            <div class="mb-3">
                <label for="nama_motor" class="form-label">Nama Motor</label>
                <input type="text" class="form-control" id="nama_motor" name="nama_motor" value="{{ $motor->nama_motor }}" required>
            </div>
            <div class="mb-3">
                <label for="merek_motor" class="form-label">Brand Motor</label>
                <input type="text" class="form-control" id="merek_motor" name="merek_motor" value="{{ $motor->merek_motor }}" required>
            </div>
            <div class="mb-3">
                <label for="tahun_pembuatan" class="form-label">Tahun Pembuatan</label>
                <input type="number" class="form-control" id="tahun_pembuatan" name="tahun_pembuatan" value="{{ $motor->tahun_pembuatan }}" required>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ $motor->jumlah }}" required>
            </div>

            <div class="mb-3">
                <label for="foto_motor" class="form-label">Foto Motor</label>
                <input type="file" class="form-control" id="foto_motor" name="foto_motor">
                @if($motor->foto_motor)
                    <img src="{{ asset('uploads/' . $motor->foto_motor) }}" alt="Foto Motor" style="width: 100px;">
                @endif
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="tersedia" {{ $motor->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="sedang disewa" {{ $motor->status == 'sedang disewa' ? 'selected' : '' }}>Sedang Disewa</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga_sewa" class="form-label">Harga Sewa</label>
                <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" value="{{ $motor->harga_sewa }}" required>
            </div>
            <div class="mb-3">
                <label for="transmisi" class="form-label">Transmisi</label>
                <select class="form-select" id="transmisi" name="transmisi" required>
                    <option value="manual" {{ $motor->transmisi == 'manual' ? 'selected' : '' }}>Manual</option>
                    <option value="matic" {{ $motor->transmisi == 'matic' ? 'selected' : '' }}>Matic</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection

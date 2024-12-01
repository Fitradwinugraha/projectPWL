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
            <a href="{{ route('admin.kelola-akun') }}" class="nav-link">
                <img src="{{ asset('assets/img/user.png') }}" alt="User  Icon" style="width: 18px; height: 18px; margin-right: 8px; vertical-align: middle;">
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
                <img src="{{ asset('assets/img/user.png') }}" alt="User  Icon" style="width: 18px; height: 18px; margin-right: 8px; vertical-align: middle;">
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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.update_status_transaksi', $transaksi->id) }}" method="POST">
    @csrf

    <div class="detail-edit">
        <h4>Detail Transaksi</h4>
        <div class="detail-item">
            <strong>Nama Penyewa:</strong>
            <span>{{ $transaksi->user->nama }}</span>
        </div>
        <div class="detail-item">
            <strong>Motor:</strong>
            <span>{{ $transaksi->motor->nama_motor }}</span>
        </div>
        <div class="detail-item">
            <strong>Tanggal Sewa:</strong>
            <span>{{ $transaksi->tanggal_sewa }}</span>
        </div>
        <div class="detail-item">
            <strong>Tanggal Kembali:</strong>
            <span>{{ $transaksi->tanggal_kembali }}</span>
        </div>
        <div class="detail-item">
            <strong>Total Harga:</strong>
            <span>Rp {{ number_format($transaksi->total_harga, 3, ',', '.') }}</span>
        </div>
        <div class="detail-item">
            <strong>Metode Pembayaran:</strong>
            <span>{{ strtoupper($transaksi->metode_pembayaran) }}</span>
        </div>
        <div class="detail-item">
            <strong>Bukti Pembayaran:</strong>
            <span><br>
            <img src="{{ asset('storage/' . $transaksi->foto_bukti_pembayaran) }}" alt="Bukti Pembayaran" style="width: 500px; height: auto;"></span>
        </div>
        <div class="detail-item">
            <strong>Foto KTP:</strong>
            <span><br>
            <img src="{{ asset('uploads/' . $transaksi->foto_ktp) }}" alt="KTP" style="width: 500px; height: auto;">
        </div>
    </div>

    <div class="form-group">
        <label for="status"><strong>Status Transaksi</strong></label>
        <select name="status" id="status" class="form-control">
            <option value="pending" {{ $transaksi->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="dikonfirmasi" {{ $transaksi->status == 'dikonfirmasi' ? 'selected' : '' }}>Dikonfirmasi</option>
            <option value="ditolak" {{ $transaksi->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            <option value="selesai" {{ $transaksi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Perbarui Status</button>

    </form>
    </div>
</div>
@endsection

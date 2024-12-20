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
<div class="transaksi-table-container">
    <h4>Daftar Transaksi</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penyewa</th>
                <th>Nama Motor</th>
                <th>Foto KTP</th>
                <th>Nomor Identitas</th> 
                <th>Nomor Telepon</th> 
                <th>Email</th>
                <th>Tanggal Penyewaan</th>
                <th>Tanggal Pengembalian</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Metode Pembayaran</th>
                <th>Foto Bukti Pembayaran</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksi as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->user->nama }}</td>
                <td>{{ $item->motor->nama_motor }}</td>
                <td>
                    <img src="{{ asset('uploads/' . $item->user->foto_ktp) }}" alt="Foto KTP" style="width: 50px; height: 50px;">
                </td>
                <td>{{ $item->user->nomor_identitas }}</td>
                <td>{{ $item->user->nomor_telepon }}</td>
                <td>{{ $item->user->email }}</td>
                <td>{{ $item->tanggal_penyewaan }}</td>
                <td>{{ $item->tanggal_pengembalian }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>Rp {{ number_format($item->total_harga, 2, ',', '.') }}</td>
                <td>{{ strtoupper($item->metode_pembayaran) }}</td>
                <td>
                    <img src="{{ asset('uploads/' . $item->foto_bukti_pembayaran) }}" alt="Bukti Pembayaran" style="width: 50px; height: 50px;">
                </td>
                <td>
                    <span class="badge {{ $item->status == 'pending' ? 'bg-warning' : ($item->status == 'dikonfirmasi' ? 'bg-success' : 'bg-danger') }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Detail</a>
                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="15" class="text-center">Belum ada transaksi.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

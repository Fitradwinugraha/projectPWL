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
<div class="horizontal-scroll">
<div class="transaksi-table-container">
    <h4>Daftar Transaksi</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penyewa</th>
                <th>Nama Motor</th>
                <th>Nomor Telepon</th> 
                <th>Email</th>
                <th>Tanggal Penyewaan</th>
                <th>Tanggal Pengembalian</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Metode Pembayaran</th>
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
                <td>{{ $item->no_telepon }}</td>
                <td>{{ $item->user->email }}</td>
                <td>{{ $item->tanggal_sewa }}</td>
                <td>{{ $item->tanggal_kembali }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>Rp {{ number_format($item->total_harga, 2, ',', '.') }}</td>
                <td>{{ strtoupper($item->metode_pembayaran) }}</td>
                <td>
                    <span class="badge 
                        {{ 
                            $item->status == 'menunggu konfirmasi' ? 'bg-warning' : 
                            ($item->status == 'dikonfirmasi' ? 'bg-primary' : 
                            ($item->status == 'selesai' ? 'bg-success' : 
                            ($item->status == 'ditolak' ? 'bg-danger' : '')))
                        }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
                <td>
                    <div style="display: flex; align-items: center;">
                        <a href="{{ route('admin.edit_status_transaksi', $item->id) }}">
                            <img src="{{ asset('assets/img/edit.png') }}" alt="Edit" style="width: auto; height: 30px; margin-right: 5px;">
                        </a>

                    <form action="{{ route('admin.deletetransaksi', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn" style="border: none; background: none; padding: 0;">
                            <img src="{{ asset('assets/img/trash.png') }}" alt="Delete" style="width: 28px; height: 28px;">
                        </button>
                    </form>
                    </div>
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
</div>
@endsection

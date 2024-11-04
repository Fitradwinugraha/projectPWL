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
<div class="motor-table-container p-10 shadow-sm">
    <h4>Daftar Motor</h4>
    <a href="{{ route('admin.tambahmotor') }}" class="btn btn-primary mb-3">Tambah Data</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Motor</th>
                <th>Brand</th>
                <th>Foto</th>
                <th>Harga Sewa</th>
                <th>Tahun</th>
                <th>Transmisi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($motors as $index => $motor)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $motor->nama_motor }}</td>
                    <td>{{ $motor->merek->merek_motor }}</td>
                    <td><img src="{{ asset('uploads/' . $motor->foto_motor) }}" alt="Foto Motor" style="width: 150px; height: auto;"></td>
                    <td>Rp. {{ number_format($motor->harga_sewa, 2, ',', '.') }}</td>
                    <td>{{$motor->merek->tahun_pembuatan }}</td>
                    <td>{{ ($motor->transmisi) }}</td>
                    <td>{{ ($motor->status) }}</td>
                    <td>
                        <a href="{{ route('admin.editmotor', $motor->id) }}" class="btn">
                            <img src="{{ asset('assets/img/edit.png') }}" alt="Edit" style="width: 28px; height: 28px;">
                        </a>
                        <form action="{{ route('admin.deletemotor', $motor->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data motor ini?')">
                                <img src="{{ asset('assets/img/remove.png') }}" alt="Delete" style="width: 28px; height: 28px;">
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

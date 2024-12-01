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
<div class="transaksi-table-container">
    <h4>Data Costumer</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Costumer</th>
                <th>Email</th>
                <th>Alamat Rumah</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
    @forelse ($users as $key => $user)
        @if ($user->role !== 'admin')  <!-- Memastikan yang ditampilkan bukan admin -->
            <tr>
                <td>{{ $key + 0 }}</td>
                <td>{{ $user->nama ?? '-' }}</td> <!-- Kolom nama -->
                <td>{{ $user->email ?? '-' }}</td> 
                <td>{{ $user->alamat ?? '-' }}</td>
                <td><img src="{{ asset('storage/' . $user->foto) }}" alt="Belum ada foto" style="width: 100px; height: auto;"></td> <!-- Kolom foto -->
            </tr>
        @endif
    @empty
        <tr>
            <td colspan="6" class="text-center">Belum ada data</td>
        </tr>
    @endforelse
</tbody>
    </table>
</div>
@endsection
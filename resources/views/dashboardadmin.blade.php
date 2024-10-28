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

@section('navbar')
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Navbar</span>
  </div>
</nav>
@endsection

@section('content')
<div class="content mt-4">
    <p><img src="{{ asset('assets/img/home.png') }}" alt="User Icon" style="width: 30px; height: 30px; margin-right: 8px; vertical-align: middle;">
    Dashboard</p>
    <h4>Selamat Datang, Admin!</h4>
    
    
    
    <div class="container d-flex gap-5 mt-4">
        <div class="card card-blue">
            <div class="title">Akun</div>
            <div class="value">--</div>
            <div class="icon"><i class="fas fa-dollar-sign"></i></div>
        </div>
        <div class="card card-green">
            <div class="title">Armada SepedaMotor</div>
            <div class="value">--</div>
            <div class="icon"><i class="fas fa-exchange-alt"></i></div>
        </div>
        <div class="card card-teal">
            <div class="title">Total Booking</div>
            <div class="value">--</div>
            <div class="icon"><i class="fas fa-wallet"></i></div>
        </div>
       
    </div>
</div>
@endsection


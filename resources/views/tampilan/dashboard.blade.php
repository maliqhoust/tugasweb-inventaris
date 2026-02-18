@extends('layouts.app2')
@section('title', 'Dashboard')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  <h1 style="font-family: Arial, sans-serif; align-items: center; text-align: center; margin-top: 30px;">
    HI! THANK YOU FOR TRUSTING <span style="color:#1D40BA;">enTrusT</span>
  </h1>

  <div class="hero">
        <div class="hero-left">
            <h1>Selamat Datang di<br> enTrusT</h1>
            <p>Kelola barang, peminjaman, dan stok dengan mudah, modern, dan terintegrasi.</p>
          </div>
          
          <div class="hero-right">
            <img src="images/logo.jpg" alt="illustration">
          </div>
        </div>
        <div class="center"> 
        <a href="{{ route ('barangs.index') }}" class="btn-yellow">klik Untuk Memulai</a>
        </div>
</div>



@endsection
@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')


<div class="card">
    <div class="card-header bg-primary text-white">Tambah Peminjaman</div>
    <div class="card-body">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('peminjamans.store') }}" method="POST">
        @csrf

        <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
        <input type="text" name="nama_peminjam" id="nama_peminjam"
               class="form-control" placeholder="Masukkan nama peminjam" required>

        <label for="kelas" class="form-label">Kelas</label>
        <input type="text" name="kelas" id="kelas"
                class="form-control" placeholder="Masukkan kelas (contoh: X IPA 1)" required>


        <label for="barang_id" class="form-label">Nama Barang</label>
        <select name="barang_id" id="barang_id" class="form-select" required>
            <option value="">-- Pilih Barang --</option>
            @foreach ($barangs as $barang)
                <option value="{{ $barang->id }}">{{ $barang->nama_barang }} (Stok: {{ $barang->stok }})</option>
            @endforeach
        </select>

        <label for="jumlah" class="form-label">Jumlah Barang</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control"
               placeholder="Masukkan jumlah barang" required min="1">

        <label for="tanggal_pinjam" class="form-label">Tanggal Peminjaman</label>
        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" required>

        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea name="keterangan" id="keterangan" class="form-control"
                  placeholder="Tulis keterangan (opsional)"></textarea>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    
    </div>
</div>
</div>
@endsection
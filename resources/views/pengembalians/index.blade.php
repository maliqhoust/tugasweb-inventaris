@extends('layouts.app')

@section('title', 'Data Pengembalian')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Pengembalian</h2>
    <a href="{{ route('pengembalians.create') }}" class="btn btn-primary">+ Tambah Pengembalian</a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Kelas</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Tanggal Pengembalian</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($pengembalians as $index => $kembali)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $kembali->peminjaman->nama_peminjam }}</td>
            <td>{{ $kembali->peminjaman->kelas }}</td>
            <td>{{ $kembali->peminjaman->barang->nama_barang }}</td>
            <td>{{ $kembali->peminjaman->jumlah }}</td>
            <td>{{ $kembali->tanggal_pengembalian }}</td>
            <td>{{ $kembali->keterangan ?? '-' }}</td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">Belum ada data pengembalian.</td></tr>
        @endforelse
    </tbody>
</table>

<a href="{{ route('barangs.index') }}" class="btn btn-primary">Kembali</a>
@endsection

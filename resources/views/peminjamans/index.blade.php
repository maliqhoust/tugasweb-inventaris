@extends('layouts.app')

@section('title', 'Data Peminjaman')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Peminjaman</h2>
    <a href="{{ route('peminjamans.create') }}" class="btn btn-primary">+ Tambah Peminjaman</a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Kelas</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Keterangan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($peminjamans as $index => $p)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $p->nama_peminjam }}</td>
            <td>{{ $p->kelas }}</td>
            <td>{{ $p->barang->nama_barang }}</td>
            <td>{{ $p->jumlah }}</td>
            <td>{{ $p->tanggal_pinjam }}</td>
            <td>{{ $p->tanggal_kembali ?? '-' }}</td>
            <td>{{ $p->keterangan }}</td>
            <td>
                <span class="badge bg-{{ $p->status == 'dipinjam' ? 'warning' : 'success' }}">
                    {{ ucfirst($p->status) }}
                </span>
            </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center">Belum ada data peminjaman.</td></tr>
        @endforelse
    </tbody>
</table>

<a href="{{ route('barangs.index') }}" class="btn btn-primary">Kembali</a>
@endsection

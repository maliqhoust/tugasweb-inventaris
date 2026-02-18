@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Barang</h2>
    <a href="{{ route('barangs.create') }}" class="btn btn-primary">+ Tambah Barang</a>
</a>

</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="GET" action="{{ route('barangs.index') }}" class="mb-3">
    <input type="text" name="search" class="form-control" placeholder="Cari barang..." value="{{ $search ?? '' }}">
</form>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kode</th>
            <th>Stok</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($barangs as $index => $barang)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $barang->nama_barang }}</td>
            <td>{{ $barang->kode_barang }}</td>
            <td>{{ $barang->stok }}</td>
            <td>{{ $barang->keterangan }}</td>
            <td>
                <a href="{{ route('barangs.edit', $barang->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus barang ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">Belum ada data barang.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection

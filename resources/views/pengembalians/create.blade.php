@extends('layouts.app')

@section('title', 'Tambah Pengembalian')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Tambah Pengembalian</div>
    <div class="card-body">
        <form action="{{ route('pengembalians.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Peminjaman</label>
                <select name="peminjaman_id" class="form-control" required>
                    <option value="">-- Pilih Peminjaman yang Belum Dikembalikan --</option>
                    @foreach ($peminjamans as $p)
                        <option value="{{ $p->id }}">{{ $p->nama_peminjam }} - {{ $p->barang->nama_barang }} ({{ $p->jumlah }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Tanggal Pengembalian</label>
                <input type="date" name="tanggal_pengembalian" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>
            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('pengembalians.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection

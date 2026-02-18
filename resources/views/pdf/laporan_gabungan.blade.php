<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Inventaris Gabungan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2, h3 { text-align: center; margin: 10px 0; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        th, td { border: 1px solid black; padding: 6px; text-align: left; }
        .page-break { page-break-after: always; }
    </style>
</head>
<body>
    <h2>LAPORAN INVENTARIS</h2>
    <hr>

    <!-- =================== BAGIAN 1: BARANG =================== -->
    <h3>Data Barang</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Stok</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->kode_barang }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->keterangan ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="page-break"></div>

    <!-- =================== BAGIAN 2: PEMINJAMAN =================== -->
    <h3>Data Peminjaman</h3>
    <table>
        <thead>
            <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Kelas</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Keterangan</th>
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
        </tr>
            @endforeach
        </tbody>
    </table>

    <div class="page-break"></div>

    <!-- =================== BAGIAN 3: PENGEMBALIAN =================== -->
    <h3>Data Pengembalian</h3>
    <table>
        <thead>
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
            @endforeach
        </tbody>
    </table>
</body>
</html>

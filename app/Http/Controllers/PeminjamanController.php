<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Barang;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf; // tambahkan di atas

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $peminjamans = Peminjaman::with('barang')->get();


foreach ($peminjamans as $p) {
    if ($p->tanggal_kembali && Carbon::parse($p->tanggal_kembali)->lt(Carbon::today()) && $p->status == 'dipinjam') {
        $p->status = 'terlambat';
    }
}


    return view('peminjamans.index', compact('peminjamans'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $barangs = Barang::all();
        return view('peminjamans.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'nama_peminjam' => 'required',
        'kelas' => 'nullable|string',
        'barang_id' => 'required',
        'jumlah' => 'required|integer',
        'tanggal_pinjam' => 'required|date',
        'tanggal_pengembalian' => 'nullable|date',
        'keterangan' => 'nullable|string',
    ]);

    // Ambil barang berdasarkan ID
    $barang = Barang::findOrFail($request->barang_id);

    // Cek apakah stok mencukupi
    if ($barang->stok < $request->jumlah) {
        return back()->with('error', 'Stok barang tidak mencukupi!');
    }

    // Kurangi stok barang
    $barang->stok -= $request->jumlah;
    $barang->save();


    Peminjaman::create([
        'nama_peminjam' => $request->nama_peminjam,
        'kelas' => $request->kelas,
        'barang_id' => $request->barang_id,
        'jumlah' => $request->jumlah,
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'keterangan' => $request->keterangan,
        'status' => 'Dipinjam',
    ]);

    return redirect()->route('peminjamans.index')->with('success', 'Data berhasil ditambahkan');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $barang = $peminjaman->barang;

        // Balikin stok kalau dihapus sebelum dikembalikan
        if ($peminjaman->status === 'Dipinjam') {
            $barang->stok += $peminjaman->jumlah;
            $barang->save();
        }

        $peminjaman->delete();
        return redirect()->route('peminjamans.index')->with('success', 'Data peminjaman dihapus!');
    
    }
}

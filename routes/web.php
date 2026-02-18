<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PdfController;

Route::get('barangs', function () {
    return redirect()->route('index.barangs'); // 🔥 bukan return view()
});

Route::resource('barangs', BarangController::class);
Route::resource('peminjamans', PeminjamanController::class);
Route::resource('pengembalians', PengembalianController::class);
Route::get('/peminjamans/export/pdf', [PeminjamanController::class, 'exportPdf'])->name('peminjamans.exportPdf');

Route::get('/export/laporan-gabungan', [PdfController::class, 'exportAll'])->name('export.laporan');

Route::get('/dashboard', function () {
    return view('tampilan.dashboard');
})->name('tampilan.dashboard');

Route::get('/', function () {
    return view('tampilan.dashboard');
});

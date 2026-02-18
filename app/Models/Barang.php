<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs'; // pastikan sama dengan nama tabel di migration

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'stok',
        'keterangan',
    ];

    // Relasi: satu barang bisa dipinjam berkali-kali
    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }
}

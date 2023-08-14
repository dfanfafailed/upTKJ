<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable =[
        'namabarang',
        'hargabarang',
        'stok',
        'foto'
    ];

    public function Transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable=[
        'barang_id',
        'jumlahbarang',
    ];
    public function Barang()
    {
        return $this->belongsTo(Barang::class);
    }


    public function getHargabarang(){
        return $this->hasOne(Barang::class ,'id',);
    }
}

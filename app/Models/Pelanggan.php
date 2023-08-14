<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Pelanggan extends Authenticatable
{
    use HasFactory;
    protected $table = "pelanggan";
    protected $primaryKey = "id_pelanggan";
    protected $guarded = ["id_pelanggan"];
}

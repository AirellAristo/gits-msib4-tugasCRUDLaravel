<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjangModels extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'ID_Keranjang';

    protected $fillable = [
        'jumlah_produk',
        'total_harga',
        'ID_produk'
    ];
}

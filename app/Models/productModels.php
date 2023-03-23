<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productModels extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'ID_produk';

    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'ID_kategori'
    ];
}

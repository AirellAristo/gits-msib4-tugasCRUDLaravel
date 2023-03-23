<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoriesModel extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'ID_kategori';

    use HasFactory;
    protected $fillable = [
        'nama_kategori'
    ];
}

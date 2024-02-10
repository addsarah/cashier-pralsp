<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    public function pembelians()
    {
        return $this->hasMany(Pembelian::class);
    }

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_barang',
        'gambar',
        'harga',
        'stok',
    ];

    
}


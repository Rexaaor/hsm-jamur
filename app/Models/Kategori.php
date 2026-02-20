<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;

    protected $fillable = [
        'nama_kategori',
    ];

    // Relasi: 1 kategori punya banyak produk
    public function products()
    {
        return $this->hasMany(Product::class, 'id_kategori', 'id_kategori');
    }
}

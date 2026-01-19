<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image_path',
    ];

    // Relasi: satu produk bisa difavoritkan banyak user
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // Relasi: satu produk bisa ada di banyak order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

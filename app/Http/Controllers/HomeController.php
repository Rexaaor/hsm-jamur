<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::take(2)->get()->map(fn ($p) => [
            'id' => $p->id_produk,
            'name' => $p->nama_produk,
            'description' => $p->deskripsi_produk,
            'image' => asset($p->image_path),
        ]);

        return Inertia::render('Home', [
            'products'   => $products,
            'heroImage'  => asset('aset/img/farm1.jpg'),
            'aboutImage' => asset('aset/img/farm2.jpg'),
        ]);
    }
}

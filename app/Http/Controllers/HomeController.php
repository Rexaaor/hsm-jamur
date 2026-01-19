<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\FarmTour;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil produk untuk grid
        $products = Product::all()->take(2)->map(fn ($p) => [
            'id' => $p->id,
            'name' => $p->name,
            'description' => $p->description,
            'image' => asset($p->image_path),
        ]);

        // Ambil gambar dari tabel farm_tours (asumsi ada kolom image_path)
        // Kita ambil 2 data pertama untuk Hero dan About
        $farmData = FarmTour::all();
        
        return Inertia::render('Home', [
            'products' => $products,
            'heroImage' => isset($farmData[0]) ? asset($farmData[0]->image_path) : 'https://via.placeholder.com/800x600',
            'aboutImage' => isset($farmData[1]) ? asset($farmData[1]->image_path) : 'https://via.placeholder.com/800x600',
        ]);
    }
}
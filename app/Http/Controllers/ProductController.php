<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->map(fn ($p) => [
            'id' => $p->id,
            'name' => $p->name,
            'description' => $p->description,
            'image' => asset($p->image_path),
            'tag' => $p->name === 'Jamur Tiram Putih' ? 'Best Seller' : 'Premium',
        ]);

        return Inertia::render('Produk', [
            'products' => $products,
        ]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        $details = match ($product->name) {
            'Jamur Tiram Putih' => [
                'latin' => 'Pleurotus ostreatus',
                'keluarga' => 'Pleurotaceae',
                'deskripsi' => 'Jamur Tiram Putih memiliki tekstur lembut dengan rasa gurih alami...',
                'nutrisi' => 'Kaya protein nabati, vitamin B-kompleks, zat besi, dan kalium.',
                'penggunaan' => 'Ideal untuk tumisan, sup, crispy jamur.',
                'gallery' => [
                    asset('aset/img/jamurp1.jpg'),
                    asset('aset/img/jamurp2.jpg'),
                    asset('aset/img/jamurp3.jpg'),
                ],
            ],
            'Jamur Tiram Coklat' => [
                'latin' => 'Pleurotus cystidiosus',
                'keluarga' => 'Pleurotaceae',
                'deskripsi' => 'Jamur Tiram Coklat beraroma khas dan lebih gurih.',
                'nutrisi' => 'Protein tinggi, kaya antioksidan.',
                'penggunaan' => 'Masakan oriental dan tumisan pedas.',
                'gallery' => [
                    asset('aset/img/jamur_tiram_coklat_1.jpg'),
                    asset('aset/img/jamur_tiram_coklat_2.jpg'),
                    asset('aset/img/jamur_tiram_coklat_3.jpg'),
                ],
            ],
            default => null,
        };

        return Inertia::render('ProdukDetail', [
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'image' => asset($product->image_path),
                'details' => $details,
            ],
        ]);
    }
}

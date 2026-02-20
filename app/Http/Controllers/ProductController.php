<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('kategori')->get()->map(fn ($p) => [
            'id' => $p->id_produk,
            'name' => $p->nama_produk,
            'harga' => $p->harga_produk,
            'description' => $p->deskripsi_produk,
            'kategori' => $p->kategori?->nama_kategori,
            'image' => asset($p->image_path),
        ]);

        return Inertia::render('Produk', [
            'products' => $products,
        ]);
    }



    public function show($id)
    {
        $product = Product::with('kategori')
        ->where('id_produk', $id)
        ->firstOrFail();

        $details = match ($product->nama_produk) {
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
                'id' => $product->id_produk,
                'name' => $product->nama_produk,
                'harga' => $product->harga_produk,
                'image' => asset($product->image_path),
                'kategori' => $product->kategori?->nama_kategori,
                'details' => $details,
            ],
        ]);
    }

}

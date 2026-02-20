<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ClickLogs;
use Carbon\Carbon;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

    // Dashboard data
    $totalClicks = ClickLogs::count();

    $todayClicks = ClickLogs::whereDate('created_at', Carbon::today())->count();

    $topProducts = \DB::table('click_logs')
    ->join('produk', 'produk.id_produk', '=', 'click_logs.id_produk')
    ->select(
        'produk.id_produk',
        'produk.nama_produk',
        \DB::raw('COUNT(click_logs.id_logs) as total')
    )
    ->groupBy('produk.id_produk', 'produk.nama_produk')
    ->orderByDesc('total')
    ->limit(5)
    ->get()
    ->map(fn ($row) => [
        'id' => $row->id_produk,
        'nama' => $row->nama_produk,
        'total' => $row->total,
    ]);



    return Inertia::render('Admin/Produk', [
        'products' => $products,
        'dashboard' => [
            'total_clicks' => $totalClicks,
            'today_clicks' => $todayClicks,
            'top_products' => $topProducts,
        ],
    ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk'      => 'required|string|max:255',
            'harga_produk'     => 'required|integer|min:0',
            'deskripsi_produk' => 'nullable|string'
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->only([
            'nama_produk',
            'harga_produk',
            'deskripsi_produk'
        ]));

        return back()->with('success', 'Produk berhasil diperbarui');
    }
}

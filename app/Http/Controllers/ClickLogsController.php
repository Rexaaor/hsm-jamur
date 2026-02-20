<?php

namespace App\Http\Controllers;

use App\Models\ClickLogs;
use Illuminate\Http\Request;

class ClickLogsController extends Controller
{
    public function store(Request $request)
    {
        ClickLogs::create([
            'source_page' => $request->source_page,
            'id_produk'   => $request->product_id,
            'target'      => 'whatsapp',
        ]);

        return response()->json(['status' => 'ok']);
    }
}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class ClickLogs extends Model
{
    use HasFactory;

    protected $table = 'click_logs';

    // WAJIB: Beritahu Laravel nama kolom Primary Key-nya
    protected $primaryKey = 'id_logs';

    protected $fillable = [
        'source_page',
        'id_produk',
        'target',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk', 'id_produk');
    }

}

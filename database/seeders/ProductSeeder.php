<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Jamur Tiram Putih',
                'description' => 'Segar dan lembut, cocok untuk tumisan dan sup.',
                'price' => 12000,
                'image_path' => 'aset/img/jamur-tiram-putih.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jamur Tiram Coklat',
                'description' => 'Memiliki aroma khas dan tekstur lebih padat.',
                'price' => 13000,
                'image_path' => 'aset/img/jamur-tiram-coklat.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

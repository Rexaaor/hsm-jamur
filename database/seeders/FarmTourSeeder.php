<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // ✅ INI YANG KURANG

class FarmTourSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('farm_tours')->insert([
            [
                'title' => 'Pembibitan Unggul',
                'description' => 'Perjalanan dimulai di ruang steril...',
                'image_path' => 'aset/img/farm1.jpg',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Inkubasi & Pertumbuhan',
                'description' => 'Baglog disimpan di ruang inkubasi...',
                'image_path' => 'aset/img/farm2.jpg',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Panen Setiap Hari',
                'description' => 'Jamur dipanen setiap pagi...',
                'image_path' => 'aset/img/farm3.jpg',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

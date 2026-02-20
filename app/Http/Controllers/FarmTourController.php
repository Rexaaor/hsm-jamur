<?php

namespace App\Http\Controllers;

use App\Models\FarmTour;
use Inertia\Inertia;

class FarmTourController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel farm_tours melalui Model
        $farmTours = FarmTour::all()->map(fn ($ft) => [
            'id'          => $ft->id_farmtour,
            'name'        => $ft->name,        // Sesuai model
            'description' => $ft->description, // Sesuai model
            'image'       => asset($ft->image_path), // Sesuai model
        ]);

        return Inertia::render('FarmTour', [
            'farmTours' => $farmTours
        ]);
    }
}
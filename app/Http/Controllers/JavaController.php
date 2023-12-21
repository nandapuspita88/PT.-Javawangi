<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Javapedia;

class JavaController extends Controller
{
    public function index()
    {
        return view('page/javapedia',[
            "title" => "Javapedia",
            "produk" => Javapedia::all()
        ]);
    }

    public function show(Javapedia $produk)
    {
        return view('detail-komoditas',[
            "title" => "Detail Komoditas",
            "semua" => Javapedia::all(),
            "produk" => $produk
        ]);
    }

}

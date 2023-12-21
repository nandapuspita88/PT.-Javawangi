<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bisnis;

class BisnisController extends Controller
{
    public function index()
    {
        return view('page/bisnis',[
            "title" => "Bisnis",
            "produk" => Bisnis::all()
        ]);
    }

    public function show(Bisnis $produk)
    {
        return view('detail-produk',[
            "title" => "Detail Produk",
            "produk" => $produk
        ]);
    }

   

    
}

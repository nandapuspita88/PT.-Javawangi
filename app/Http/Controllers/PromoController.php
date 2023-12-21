<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;

class PromoController extends Controller
{
    public function index()
    {
        return view('list-promo',[
            "title" => "Daftar Promo",
            "promo" =>Promo::all()
        ]);
    }

    public function show(Promo $promo)
    {
        return view('detail-promo',[
            "title" => "Detail Promo",
            "promo" => $promo,
            "semua" =>Promo::all()
        ]);
    }
}

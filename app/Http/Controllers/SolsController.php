<?php

namespace App\Http\Controllers;

use App\Models\Solusi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SolsController extends Controller
{
    public function index(){
        return view('page/solusi',[
    	"title" => "Solusi Masalah",
        "solusi" => Solusi::all()
        
        ]);
    }
    
    public function show(Solusi $solusi)
    {
        return view('single-solusi',[
            "title" => "Artikel",
            "solusi" => $solusi,
            "berita" => Solusi::all()
        ]);
    }
}

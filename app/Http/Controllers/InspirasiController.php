<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use App\Models\Insp;
use Illuminate\Support\Str;

class InspirasiController extends Controller
{
   public function index(){
        return view('page/inspirasi',[
        "title" => "Inspirasi",
        "ins" => Insp::all()
        
        ]);
    }
    
    public function show($id)
    {
        $insp = Insp::find($id);
        return view('single-ins',[
            "title" => "Artikel",
            "ins" => $insp,
            "berita" => Insp::all()
        ]);
    }
}

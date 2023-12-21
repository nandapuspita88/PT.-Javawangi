<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Promo;
use App\Models\Banner;
use App\Models\Support;

class HomeController extends Controller
{
    public function index()
    {
        return view('page.home',[
            "title" => "Home",
            "promo" => Promo::all(),
            "banner" => Banner::all(),
            "support" => Support::all()           
        ]);
    }


   
    
}

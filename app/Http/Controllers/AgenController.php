<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agen;
use App\Models\Franchise;
use App\Models\Mitra;
use App\Models\User;
use App\Models\Support;

class AgenController extends Controller
{
    public function index()
    {
        return view('page.layanan',[
            "title" => "Layanan",
            "agen" => Agen::all(),
            "total_agen" => Agen::count(),
            "total_mitra" => Mitra::count(),
            "total_franchise" => Franchise::count(),
            "total_support" => Support::count(),
            "total_user" => User::count(),           
        ]);
    }

    public function agen()
    {
        return view('list-agen',[
            "title" => "Daftar Agen",
            "agen" => Agen::all()
        ]);
    }

    public function franchise()
    {
        return view('list-franchise',[
        "title" => "Daftar Franchise",
         "franchise" => Franchise::all()
        
        ]);
    }

    public function show(Agen $agen)
    {
        return view('detail-agen',[
            "title" => "Detail Agen",
            "agen" => $agen
        ]);
    }
}

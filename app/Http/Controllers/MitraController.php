<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    public function index()
    {
        return view('form-mitra',[
            "title" => "Daftar Mitra"
            
        ]);
    }

    public function create(Request $request)
    {
        $data=$request->validate([
            'nama_mitra' => 'required',            
            'alamat'=>'required',
            'email'=>'email|required',
            'telp'=>'required',
            'jenis'=>'required',
            'foto'=>'image|file|max:10000',
       ]);

       if($request->file('foto')){
            $data['foto'] = $request->file('foto')->store('mitra');
       }
       
       Mitra::create($data);
       return redirect('/layanan/mitra')->with('sukses','Pendaftaran Mitra Berhasil!');
    }
}

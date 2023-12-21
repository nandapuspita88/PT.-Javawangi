<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AdminBahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bahan.index',[
            "title" => "Bahan Alam",
            "bahan" => Bahan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bahan.tambah',[
            "title" =>"Bahan Alam",            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([            
            'gambar'=>'image|file|max:10000',
       ]);

       if($request->file('gambar')){
            $data['gambar'] = $request->file('gambar')->store('bahan');
       }
       
       Bahan::create($data);
       return redirect('/admin/bahan')->with('sukses','Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('single-bahan',[
            "title" => "Bahan Alam",
            "gambar" => Bahan::find($id)       
        ]);
    }

    public function showAll()
    {
        return view('page/bahan',[
            "title" => "Bahan Alam",
            "gambar" => Bahan::all()       
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bahan = Bahan::find($id);
        return view('admin.bahan.edit',[
            "title" => "Edit bahan",
            "bahan" => $bahan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=[            
            'gambar'=>'image|file|max:10000',
        ];

        $validateData=$request->validate($data);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['gambar'] = $request->file('gambar')->store('bahan');
       }
        
        Bahan::where('id',$id)
                ->update($validateData);


       return redirect('/admin/bahan')->with('sukses','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bahan = Bahan::find($id);
        if($bahan->gambar){
            Storage::delete($bahan->gambar);
        }

        Bahan::destroy($bahan->id);
       return redirect('/admin/bahan')->with('sukses','Data Berhasil Dihapus!');
    }
    
}

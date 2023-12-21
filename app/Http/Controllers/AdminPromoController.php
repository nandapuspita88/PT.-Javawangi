<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminPromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.promo.index',[
            "title" => "Promo",
            "promo" => Promo::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promo.tambah',[
            "title" =>"Promo Baru",            
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
            'nama_promo' => 'required',            
            'keterangan'=>'required',
            'berlaku'=>'required',
            'gambar'=>'image|file|max:10000',
       ]);

       if($request->file('gambar')){
            $data['gambar'] = $request->file('gambar')->store('promo');
       }
       
       Promo::create($data);
       return redirect('/admin/promo')->with('sukses','Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        return view('admin.promo.edit',[
            "title" => "Edit Data Produk",
            "promo" => $promo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promo)
    {
        $data=[
            'nama_promo' => 'required',                       
            'keterangan'=>'required',
            'berlaku'=>'required',
            'gambar'=>'image|file|max:10000',
        ];

        $validateData=$request->validate($data);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['gambar'] = $request->file('gambar')->store('promo');
       }
        
        Promo::where('id',$promo->id)
                ->update($validateData);


       return redirect('/admin/promo')->with('sukses','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Promo $promo)
    {
        if($promo->gambar){
            Storage::delete($promo->gambar);
        }

        Promo::destroy($promo->id);
       return redirect('/admin/promo')->with('sukses','Data Berhasil Dihapus!');
    }
}

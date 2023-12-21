<?php

namespace App\Http\Controllers;

use App\Models\Solusi;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SolusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.solusi.index',[
            "title" => "Solusi Masalah",
            "solusi" => Solusi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.solusi.tambah',[
            "title" => "Solusi Masalah",            
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
            'judul' => 'required',
            'rilis'=>'required',
            'penulis'=>'required',
            'isi'=>'required',
            'gambar'=>'image|file|max:10000',
       ]);

        $data['snap']= Str::limit(strip_tags($request->isi),200);
       if($request->file('gambar')){
            $data['gambar'] = $request->file('gambar')->store('solusi');
       }
       
       Solusi::create($data);
       return redirect('/admin/solusi')->with('sukses','Data Berhasil Ditambahkan!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Solusi $solusi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Solusi $solusi)
    {
        return view('admin.solusi.edit',[
            "title" => "Edit Artikel",
            "solusi" => $solusi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solusi $solusi)
    {
        $data=[
            'judul' => 'required',
            'rilis'=>'required',
            'penulis'=>'required',
            'isi'=>'required',
            'gambar'=>'image|file|max:10000',
       ];

        $validateData=$request->validate($data);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['gambar'] = $request->file('gambar')->store('solusi');
       }
        
        Solusi::where('id',$solusi->id)
                ->update($validateData);


       return redirect('/admin/solusi')->with('sukses','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solusi $solusi)
    {
        if($solusi->gambar){
            Storage::delete($solusi->gambar);
        }

        Solusi::destroy($solusi->id);
       return redirect('/admin/solusi')->with('sukses','Data Berhasil Dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Agen;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class AdminAgenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.agen.index',[
            "title" => "Agen",
            "agen" => Agen::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agen.tambah',[
            "title" => "Tambah Agen",            
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
            'nama_agen' => 'required',
            'slug'=>'required|unique:agens',
            'alamat'=>'required',
            'gambar'=>'image|file|max:10000',
       ]);

       if($request->file('gambar')){
            $data['gambar'] = $request->file('gambar')->store('agen');
       }
       
       Agen::create($data);
       return redirect('/admin/agen')->with('sukses','Data Agen Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function show(Agen $agen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function edit(Agen $agen)
    {
        return view('admin.agen.edit',[
            "title" => "Edit Data Agen",
            "agen" => $agen,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agen $agen)
    {
        $data=[
            'nama_agen' => 'required',           
            'alamat'=>'required',
            'gambar'=>'image|file|max:10000',
        ];

        if($request->slug != $agen->slug){
            $data['slug']='required|unique:agens';
        }
       
        $validateData=$request->validate($data);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['gambar'] = $request->file('gambar')->store('agen');
       }
        
        Agen::where('id',$agen->id)
                ->update($validateData);


       return redirect('/admin/agen')->with('sukses','Data Agen Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agen $agen)
    {
        if($agen->gambar){
            Storage::delete($agen->gambar);
        }

        Agen::destroy($agen->id);
       return redirect('/admin/agen')->with('sukses','Data Agen Berhasil Dihapus!');
    }
}

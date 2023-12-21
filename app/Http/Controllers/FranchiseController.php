<?php

namespace App\Http\Controllers;

use App\Models\Franchise;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class FranchiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        return view('admin.franchise.index',[
            "title" => "Franchise",
            "franchise" => Franchise::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.franchise.tambah',[
            "title" => "Tambah Franchise",            
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
            'nama_franchise' => 'required',
            'jam_buka'=>'required',
            'alamat'=>'required',
            'gambar'=>'image|file|max:10000',
       ]);

       if($request->file('gambar')){
            $data['gambar'] = $request->file('gambar')->store('franchise');
       }
       
       Franchise::create($data);
       return redirect('/admin/franchise')->with('sukses','Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function show(Franchise $franchise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function edit(Franchise $franchise)
    {
        return view('admin.franchise.edit',[
            "title" => "Edit Data Franchise",
            "franchise" => $franchise,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Franchise $franchise)
    {
        $data=[
            'nama_franchise' => 'required',
            'jam_buka'=>'required',
            'alamat'=>'required',
            'gambar'=>'image|file|max:10000',
        ];

        
        $validateData=$request->validate($data);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['gambar'] = $request->file('gambar')->store('franchise');
       }
        
        Franchise::where('id',$franchise->id)
                ->update($validateData);


       return redirect('/admin/franchise')->with('sukses','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Franchise $franchise)
    {
        if($franchise->gambar){
            Storage::delete($franchise->gambar);
        }

        Franchise::destroy($franchise->id);
       return redirect('/admin/franchise')->with('sukses','Data Berhasil Dihapus!');
    }
}

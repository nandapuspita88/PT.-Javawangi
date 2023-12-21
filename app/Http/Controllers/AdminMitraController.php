<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class AdminMitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.mitra.index',[
            "title" => "Mitra",
            "mitra" => Mitra::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mitra.tambah',[
            "title" => "Tambah Mitra",            
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
            'nama_mitra' => 'required',            
            'alamat'=>'required',
            'email'=>'required|email',
            'telp'=>'required',
            'jenis'=>'required',
            'foto'=>'image|file|max:10000',
       ]);

       if($request->file('foto')){
            $data['foto'] = $request->file('foto')->store('mitra');
       }
       
       Mitra::create($data);
       return redirect('/admin/mitra')->with('sukses','Mitra Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function show(Mitra $mitra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function edit(Mitra $mitra)
    {
        return view('admin.mitra.edit',[
            "title" => "Edit Data Mitra",
            "mitra" => $mitra
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mitra $mitra)
    {
        $data=[
            'nama_mitra' => 'required',            
            'alamat'=>'required',
            'email'=>'required|email',
            'telp'=>'required',
            'jenis'=>'required',
            'foto'=>'image|file|max:10000',
        ];
      
        $validateData=$request->validate($data);

        if($request->file('foto')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['foto'] = $request->file('foto')->store('mitra');
       }
        
        Mitra::where('id',$mitra->id)
                ->update($validateData);


       return redirect('/admin/mitra')->with('sukses','Data Mitra Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mitra $mitra)
    {
        if($mitra->foto){
            Storage::delete($mitra->foto);
        }

        Mitra::destroy($mitra->id);
       return redirect('/admin/mitra')->with('sukses','Data Mitra Berhasil Dihapus!');
    }
}

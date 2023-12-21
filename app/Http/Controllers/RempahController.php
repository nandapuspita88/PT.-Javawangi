<?php

namespace App\Http\Controllers;

use App\Models\Rempah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RempahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rempah.index',[
            "title" => "Potensi Rempah",
            "bahan" => Rempah::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rempah.tambah',[
            "title" =>"Tambah Potensi Rempah",            
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
            'data'=>'image|file|max:10000',
            'potensi'=>'image|file|max:10000',
            'ekspor'=>'image|file|max:10000',
       ]);

       if($request->file('data')){
            $data['data'] = $request->file('data')->store('rempah');
       }
       if($request->file('potensi')){
            $data['potensi'] = $request->file('potensi')->store('rempah');
       }
       if($request->file('ekspor')){
            $data['ekspor'] = $request->file('ekspor')->store('rempah');
       }
       
       Rempah::create($data);
       return redirect('/admin/rempah')->with('sukses','Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rempah  $rempah
     * @return \Illuminate\Http\Response
     */
    public function show(Rempah $rempah)
    {
        return view('rempah',[
        "title" => "Potensi Rempah",
        "rempah" => Rempah::all()
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rempah  $rempah
     * @return \Illuminate\Http\Response
     */
    public function edit(Rempah $rempah)
    {
        return view('admin.rempah.edit',[
            "title" => "Edit Potensi Rempah",
            "bahan" => $rempah
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rempah  $rempah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rempah $rempah)
    {
        $data=[            
            'data'=>'image|file|max:10000',
            'potensi'=>'image|file|max:10000',
            'ekspor'=>'image|file|max:10000',
        ];

        $validateData=$request->validate($data);

        if($request->file('data')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['data'] = $request->file('data')->store('rempah');
       }
       if($request->file('potensi')){
            if($request->oldImage){
                Storage::delete($request->oldImage2);
            }
            $validateData['potensi'] = $request->file('potensi')->store('rempah');
       }
       if($request->file('ekspor')){
            if($request->oldImage){
                Storage::delete($request->oldImage3);
            }
            $validateData['ekspor'] = $request->file('ekspor')->store('rempah');
       }
        
        Rempah::where('id',$rempah->id)
                ->update($validateData);


       return redirect('/admin/rempah')->with('sukses','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rempah  $rempah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rempah $rempah)
    {
        if($rempah->data){
            Storage::delete($rempah->data);
        }
        if($rempah->ekspor){
            Storage::delete($rempah->ekspor);
        }
        if($rempah->potensi){
            Storage::delete($rempah->potensi);
        }

       Rempah::destroy($rempah->id);
       return redirect('/admin/rempah')->with('sukses','Data Berhasil Dihapus!');
    }
}

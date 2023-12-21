<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use App\Models\Insp;
use Illuminate\Support\Str;

class InsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ins.index',[
            "title" => "Inspirasi",
            "ins" => Insp::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ins.tambah',[
            "title" => "Inspirasi"            
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
            $data['gambar'] = $request->file('gambar')->store('inspirasi');
       }
       
       Insp::create($data);
       return redirect('/admin/ins')->with('sukses','Data Berhasil Ditambahkan!');
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
    public function edit($id)
    {
        return view('admin.ins.edit',[
            "title" => "Edit Artikel",
            "ins" => Insp::find($id)
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
            $validateData['gambar'] = $request->file('gambar')->store('inspirasi');
       }
        
        Insp::where('id',$id)
                ->update($validateData);


       return redirect('/admin/ins')->with('sukses','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $insp = Insp::find($id);
        if($insp->gambar){
            Storage::delete($insp->gambar);
        }

        Insp::destroy($insp->id);
       return redirect('/admin/ins')->with('sukses','Data Berhasil Dihapus!');
    }
}

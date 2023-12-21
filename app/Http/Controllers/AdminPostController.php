<?php

namespace App\Http\Controllers;

use App\Models\Bisnis;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bisnis.index',[
            "title" => "Bisnis",
            "produk" => Bisnis::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bisnis.tambah',[
            "title" => "Bisnis",            
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
            'nama_produk' => 'required',
            'slug'=>'required|unique:bisnis',
            'harga'=>'required',
            'deskripsi'=>'required',
            'gambar'=>'image|file|max:10000',
       ]);

       if($request->file('gambar')){
            $data['gambar'] = $request->file('gambar')->store('img');
       }
       
       Bisnis::create($data);
       return redirect('/admin/bisnis')->with('sukses','Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bisnis  $bisni
     * @return \Illuminate\Http\Response
     */
    public function show(Bisnis $bisni)
    {
        return $bisni;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bisnis  $bisni
     * @return \Illuminate\Http\Response
     */
    public function edit(Bisnis $bisni)
    {
        return view('admin.bisnis.edit',[
            "title" => "Edit Data Produk",
            "produk" => $bisni,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bisnis  $bisni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bisnis $bisni)
    {
        $data=[
            'nama_produk' => 'required',
                       
            'deskripsi'=>'required',
            'harga'=>'required',
            'gambar'=>'image|file|max:10000',
        ];

        if($request->slug != $bisni->slug){
            $data['slug']='required|unique:bisnis';
        }
       
        $validateData=$request->validate($data);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['gambar'] = $request->file('gambar')->store('img');
       }
        
        Bisnis::where('id',$bisni->id)
                ->update($validateData);


       return redirect('/admin/bisnis')->with('sukses','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bisnis  $bisni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bisnis $bisni)
    {
        if($bisni->gambar){
            Storage::delete($bisni->gambar);
        }

        Bisnis::destroy($bisni->id);
       return redirect('/admin/bisnis')->with('sukses','Data Berhasil Dihapus!');
    }


    public function cekSlug(Request $request)
    {
        $slug = SlugService::createSlug(Bisnis::class,'slug',$request->nama_produk);
        return response()->json(['slug' => $slug]);
    }
}
 
<?php

namespace App\Http\Controllers;

use App\Models\Javapedia;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class JavapediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.javapedia.index',[
            "title" => "Javapedia",
            "produk" => Javapedia::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.javapedia.tambah',[
            "title" => "Javapedia",            
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
            'komoditas' => 'required',
            'slug'=>'required|unique:javapedias',
            'deskripsi'=>'required',
            'gambar'=>'image|file|max:10000',
       ]);

       if($request->file('gambar')){
            $data['gambar'] = $request->file('gambar')->store('javapedia');
       }
       
       Javapedia::create($data);
       return redirect('/admin/javapedia')->with('sukses','Data Komoditas Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Javapedia  $javapedium
     * @return \Illuminate\Http\Response
     */
    public function show(Javapedia $javapedium)
    {
        return $javapedium;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Javapedia  $javapedium
     * @return \Illuminate\Http\Response
     */
    public function edit(Javapedia $javapedium)
    {
        return view('admin.javapedia.edit',[
            "title" => "Edit Data Produk",
            "produk" => $javapedium,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Javapedia  $javapedium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Javapedia $javapedium)
    {
        $data=[
            'komoditas' => 'required',           
            'deskripsi'=>'required',
            'gambar'=>'image|file|max:10000',
        ];

        if($request->slug != $javapedium->slug){
            $data['slug']='required|unique:javapedias';
        }
       
        $validateData=$request->validate($data);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['gambar'] = $request->file('gambar')->store('javapedia');
       }
        
        Javapedia::where('id',$javapedium->id)
                ->update($validateData);


       return redirect('/admin/javapedia')->with('sukses','Data Komoditas Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Javapedia  $javapedium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Javapedia $javapedium)
    {
        if($javapedium->gambar){
            Storage::delete($javapedium->gambar);
        }

        Javapedia::destroy($javapedium->id);
       return redirect('/admin/javapedia')->with('sukses','Data Komoditas Berhasil Dihapus!');
    }


    public function CekSlug(Request $request)
    {
        $slug = SlugService::createSlug(Javapedia::class, 'slug', $request->komoditas);
        return response()->json(['slug'=>$slug]);
    }
}

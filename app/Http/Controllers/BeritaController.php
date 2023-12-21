<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        return view('admin.berita.index',[
            "title" => "News",
            "berita" => Berita::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita.tambah',[
            "title" => "Berita Baru",            
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
            $data['gambar'] = $request->file('gambar')->store('berita');
       }
       
       Berita::create($data);
       return redirect('/admin/news')->with('sukses','Data Berhasil Ditambahkan!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('single-news',[
            "title" => "Hot News",
            "berita" => Berita::find($id),
            "semua" => Berita::all()      
        ]);
    }

    public function showAll()
    {
        return view('page/news',[
            "title" => "Hot News",            
            "semua" => Berita::all(),
            "terbaru" => Berita::latest('created_at')->first(),
            "random" => Berita::all()->random(4),
            "single" => Berita::inRandomOrder()->limit(1)->first(),
            "list"=> Berita::all()->random(8)                
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
        return view('admin.berita.edit',[
            "title" => "Edit Artikel",
            "berita" => Berita::find($id)
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
            
       ];

        $validateData=$request->validate($data);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['gambar'] = $request->file('gambar')->store('berita');
       }
        
        Berita::where('id',$id)
                ->update($validateData);


       return redirect('/admin/news')->with('sukses','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        if($berita->gambar){
            Storage::delete($berita->gambar);
        }

        Berita::destroy($berita->id);
       return redirect('/admin/news')->with('sukses','Data Berhasil Dihapus!');
    }
}

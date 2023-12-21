<?php

namespace App\Http\Controllers;

use App\Models\Repo;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class AdminRepoController extends Controller
{
    
    public function index()
    {
        return view('admin.repo.index',[
            "title" => "Repository",
            "repo" => Repo::all(),
        ]);
    }

   
    public function create()
    {
        return view('admin.repo.tambah',[
            "title" => "Repository",            
        ]);
    }

   
    public function store(Request $request)
    {
        $data=$request->validate([
            'judul' => 'required',
            'slug'=>'required|unique:repos',
            'cover'=>'image|file|max:10000',
            'file'=>'mimes:doc,docx,pdf|max:10000',
       ]);

       if($request->file('cover')){
            $data['cover'] = $request->file('cover')->store('repository');
       }
       
       if($request->file('file')){
            $data['file'] = $request->file('file')->store('file-repository');
       }
       
       Repo::create($data);
       return redirect('/admin/repo')->with('sukses','Data Berhasil Disimpan!');
    }

    
    public function show(Repo $repo)
    {
        return $repo;
    }

   
    public function edit(Repo $repo)
    {
        return view('admin.repo.edit',[
            "title" => "Edit Repository",
            "repo" => $repo,
        ]);
    }

   
    public function update(Request $request, Repo $repo)
    {
        $data=[
            'judul' => 'required',
           
            'cover'=>'image|file|max:10000',
            'file'=>'mimes:doc,docx,pdf|max:10000',
        ];

        
        $validateData=$request->validate($data);

        if($request->file('cover')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['cover'] = $request->file('cover')->store('repository');
       }
       
        if($request->file('file')){
            if($request->oldFile){
                Storage::delete($request->oldFile);
            }
            $validateData['file'] = $request->file('file')->store('file-repository');
       }
        
        Repo::where('id',$repo->id)
                ->update($validateData);


       return redirect('/admin/repo')->with('sukses','Data Berhasil Diubah!');
    }

  
    public function destroy(Repo $repo)
    {
        if($repo->cover){
            Storage::delete($repo->cover);
        }
        
        if($repo->file){
            Storage::delete($repo->file);
        }

        Repo::destroy($repo->id);
       return redirect('/admin/repo')->with('sukses','Data Berhasil Dihapus!');
    }


    public function CekSlug(Request $request)
    {
        $slug = SlugService::createSlug(Javapedia::class, 'slug', $request->komoditas);
        return response()->json(['slug'=>$slug]);
    }
    
    public function download(Repo $repo)
    {
       if($repo->file){
            return Storage::download($repo->file);
        }
    }
}
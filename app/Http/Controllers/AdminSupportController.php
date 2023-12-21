<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Support;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AdminSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.support.index',[
            "title" => "Support",
            "support" => Support::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.support.tambah',[
            "title" =>"Support Baru",            
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
            'gambar'=>'image|file|max:10000',
       ]);

       if($request->file('gambar')){
            $data['gambar'] = $request->file('gambar')->store('support');
       }
       
       Support::create($data);
       return redirect('/admin/support')->with('sukses','Data Berhasil Ditambahkan!');
    
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
    public function edit(Support $support)
    {
        return view('admin.support.edit',[
            "title" => "Edit support",
            "support" => $support
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Support $support)
    {
         $data=[            
            'gambar'=>'image|file|max:10000',
        ];

        $validateData=$request->validate($data);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['gambar'] = $request->file('gambar')->store('support');
       }
        
        Support::where('id',$support->id)
                ->update($validateData);


       return redirect('/admin/support')->with('sukses','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Support $support)
    {
         if($support->gambar){
            Storage::delete($support->gambar);
        }

        Support::destroy($support->id);
       return redirect('/admin/support')->with('sukses','Data Berhasil Dihapus!');
    }
}

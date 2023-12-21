<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Galeri;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.event.index',[
            "title"=>"Event",
            "event"=>Event::all(),
                      
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.tambah',[
            "title" =>"Event Baru",            
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
            'nama_event' => 'required',            
            'detail'=>'required',
            'fasilitas'=>'required',
            'tgl' => 'required', 
            'gambar'=>'image|file|max:10000',
       ]);

       if($request->file('gambar')){
            $data['gambar'] = $request->file('gambar')->store('event');
       }
       
       Event::create($data);
       return redirect('/admin/event')->with('sukses','Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('detail-event',[
            "title"=>"Event",
            "event"=>$event,
            "semua"=>Event::all()
        ]);
    }

    public function showAll()
    {
        return view('event',[
            "title" => "Event",            
            "event" => Event::all(),
            "galeri" =>Galeri::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.event.edit',[
            "title" => "Edit Event",
            "event" => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        
        $data=[
            'nama_event' => 'required',            
            'detail'=>'required',
            'fasilitas'=>'required',
            'tgl' => 'required',
            'gambar'=>'image|file|max:10000',
            
       ];
        $validateData=$request->validate($data);
        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['gambar'] = $request->file('gambar')->store('event');
       }
       
       
       Event::where('id',$event->id)
                ->update($validateData);
       return redirect('/admin/event')->with('sukses','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if($event->gambar){
            Storage::delete($event->gambar);
        }

        Event::destroy($event->id);
       return redirect('/admin/event')->with('sukses','Data Berhasil Dihapus!');
    }


    public function daftar(Request $request)
    {
        $data=$request->validate([
            'nama' => 'required',
            'event_id'=>'required',            
            'instansi'=>'required',
            'alamat'=>'required',
            'tlp' => 'required|max:12',         
       ]);
        
       
       
       Pendaftar::create($data);
       return redirect('/event')->with('sukses','Selamat,Pendaftaran Event Berhasil!');
    }

    public function list($id)
    {
        return view('list-pendaftar',[
            "title" => "List Pendaftar",            
            "x" => Event::find($id)->pendaftar,
            "event" => Event::find($id)->nama_event                          
        ]);

    }
    
    
   
}

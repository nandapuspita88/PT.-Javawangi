@extends('layout.main')
  
@section('container')


<div class="container p-3">
     <div class="col">
        <a href="/event" class="mb-3 btn btn-sm btn-outline-success float-start"><i class="fa fa-reply" aria-hidden="true"></i> Kembali</a>
    </div>    
    <h3 class="text-center fw-bold p-2 text-success mx-auto">Gallery Javawangi</h3>
    


    <div class="row row-cols-1 row-cols-lg-3 g-4">
        @foreach($galeri as $p)        
        <div class="col">
            
           
                <img src="{{ asset('storage/'.$p->gambar) }}" class="img-thumbnail img-fluid">
        
           
                   
        </div>
        @endforeach    
    </div>
</div>




@endsection
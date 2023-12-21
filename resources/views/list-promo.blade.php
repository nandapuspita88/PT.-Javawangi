@extends('layout.main')
  
@section('container')


<div class="container p-3">
    <div class="row d-flex">
        <a href="/" class="mb-3 btn btn-outline-success col-md-2"><i class="fa fa-reply" aria-hidden="true"></i> Kembali</a>
        <h3 class="text-center fw-bold p-2 text-success col-md-4 mx-auto">Daftar Promo</h3>
    </div>
    


    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($promo as $p)        
        <div class="col">
            <a href="/promo/{{ $p->id }}" class="text-decoration-none">
            <div class="card h-100 border-success border border-3 shadow shadow-3">
            <img src="{{ asset('storage/'.$p->gambar) }}" class="card-img-top img-thumbnail img-fluid">
                <div class="card-body text-dark">
                    <h5 class="card-title">{{ $p->nama_promo }}</h5>
                    <p class="card-text">{!! $p->keterangan !!}</p>
                    <p class="card-text"><small>Berlaku s/d {{ date('j F Y', strtotime($p->berlaku)) }}</small></p>
                </div>                  
            </div>
            </a>        
        </div>
        @endforeach    
    </div>
</div>




@endsection
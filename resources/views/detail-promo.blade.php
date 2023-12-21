@extends('layout.main')

@section('container')

<style type="text/css">
  .carousel-control-prev,
  .carousel-control-next,
  .slick-prev,
  .slick-next {
    
    background-color: teal;  
    width: 6vh;  
    height: 6vh;  
    border-radius: 50%;  
    top: 50%;
    transform: translateY(-50%);
  }

  .slick-slide {
    width: 35vw;    
    box-sizing: border-box;
    padding:1em;
  }
</style>



<div class="container p-3">
	<a href="/promo" class="mb-3 btn btn-outline-success"><i class="fa fa-reply" aria-hidden="true"></i> Kembali</a>
	<div class="row justify-content-center">		
		<div class="card mb-3 w-75 h-75 border border-3 border-success">
		    <h3 class="card-title my-4 fw-bold text-center text-success">PROMO {{ $promo->nama_promo }}</h3>
		    <h5 class="text-center text-success">Berlaku s/d {{ date('j F Y', strtotime($promo ->berlaku)) }}</h5>
		    <img src="{{ asset('storage/'.$promo->gambar) }}" class="img-fluid img-thumbnail rounded-top">
			<h3 class="card-title my-4 fw-bold text-center">{{ $promo->nama_promo }}</h3>
					
		    <div class="card-body">
			<p class="card-text ms-5 fw-semibold">{!! $promo->keterangan !!}</p> 								       
		    </div>			  
		  
		  
		</div>
	</div>
</div>

<h4 class="text-success my-4">Promo Javawangi Lainnya</h4>

<div class="row">  
<div class="test"> 
  @foreach($semua as $p)
    <div class="card" style="max-width: 18em">
      <a href="/promo/{{ $p->id }}" class="text-decoration-none">
        <img src="{{ asset('storage/'.$p->gambar) }}" class="img-card-top img-fluid">
      
      <div class="card-body">
        <h5 class="card-title" style="color:teal"><strong>{{ strtoupper($p->nama_promo) }}</strong></h5>
        <p class="card-text" style="color:grey"><small>*Syarat dan Ketentuan Promo Berlaku</small></p>
        <p class="card-text small" style="color:teal">Berlaku s/d {{ date('j F Y', strtotime($p->berlaku)) }}</p>
      </div>
      </a>
    </div> 
  @endforeach 
</div>
</div>


@endsection
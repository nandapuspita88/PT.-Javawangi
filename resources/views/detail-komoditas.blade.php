
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
    width: 40vw;        
   	padding: 2em;
    box-sizing: border-box;
  }
</style>


<div class="container">
	<a href="/javapedia" class="mb-3 btn btn-sm btn-outline-success"><i class="fa fa-reply" aria-hidden="true"></i> Kembali</a>
	
	<div class="row" style="background-image:url('/img/Asset Foto Web Edukasi/3 Javapedia/Foto Kapulaga.jpeg');width: 100%; height: 100vh; background-repeat: no-repeat; background-size: 100% 100%; ">		
		<div class="col-lg-6 px-5 align-self-center text-light bg-success bg-gradient bg-opacity-50 py-5">
		    <h1 class="display-4 fst-italic">{{$produk->komoditas}}</h1>
		    <p class="lead my-3">{!!$produk->deskripsi!!}</p>		      
		</div>
	</div>

	<div class="row mt-4">
		<h3 class="fw-bold text-success">Detail Komoditas</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>

	<div class="row mt-4 py-2">
		<h3 class="fw-bold text-success">Teknik Penanaman</h3>
		<h4 class="fw-bold text-success">Fase 1</h4>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<h4 class="fw-bold text-success">Fase 2</h4>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<h4 class="fw-bold text-success">Fase 3</h4>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>

	<div class="row mt-3">
		<h3 class="fw-bold text-success">Komoditas Lainnya</h3>
		<div class="agen">
			@foreach($semua as $x)
				<a href="/javapedia/{{ $x->id }}" class="text-decoration-none">
		        <div class="card text-success shadow h-100">
				  <img src="{{asset('storage/'.$x->gambar)}}" class="img-thumbnail img-fluid" style="object-fit: fill;width: 100%;">
				  <div class="card-body text-bg-success">
				    <h6 class="card-title text-center"><strong>{{$x->komoditas}}</strong></h6>		    
				    
				  </div>
				</div>
		        </a>   
			@endforeach
		</div>
	</div>



</div>


@endsection
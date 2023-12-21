
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
   padding: 2em;
    box-sizing: border-box;
  }
</style>



<div class="container">
	<form class="d-flex" role="search">
		<input class="form-control me-2" type="search" placeholder="Cari Hot News" aria-label="Search">
		<button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
	</form>
<div class="row mt-5">
    <a href="/news/{{ $terbaru->id }}">
        <div class="card">
          <img src="{{ asset('storage/'.$terbaru->gambar) }}" style="object-fit: cover;height: 50vw;width: 100%;">
          <div class="card-img-overlay d-flex align-items-start flex-column">
            <h6 class="mt-auto text-bg-success text-truncate p-1">{{ $terbaru->judul }}</h6>                
          </div>
          <div class="card-img-overlay d-flex align-items-start flex-column mb-5">
            <div class="mt-auto text-bg-danger text-truncate p-1">Berita Terbaru</div>                
          </div>
        </div>
    </a>
</div>



<div class="row g-2 mt-5">
<h3 class="text-success">Semua Berita</h3>
@foreach($semua as $s)        
<div class="col-lg-3">
    <a href="/news/{{ $s->id }}" class="text-decoration-none">
  <div class="card shadow-sm text-center h-100" style="width: 15em">
    <img class="bd-placeholder-img card-img-top" width="100" height="200" src="{{asset('storage/'.$s->gambar)}}">
    <div class="card-body text-bg-success">
        <h5 class="card-title">{{$s->judul }}</h5>                            
    </div>
  </div>
    </a>
</div>

@endforeach
</div>


<div class="row mt-3 p-2">
    <H3 class="text-success">Berita Terbaru</H3>
    <div class="agen">
        @foreach($semua as $x)
        <a href="/news/{{ $x->id }}" class="text-decoration-none">
        <div class="card">
          <img src="{{ asset('storage/'.$x->gambar) }}" style="object-fit: cover;height: 30vh;width: 100%;">
          <div class="card-img-overlay d-flex align-items-start flex-column text-truncate ">
            <p class="mt-auto text-bg-success p-1"><small>{{ $x->judul }}</small></p>                
          </div>
          <div class="card-img-overlay d-flex align-items-start flex-column mb-5">
            <div class="mt-auto text-bg-danger text-truncate p-1">Hot News</div>                
          </div>
        </div>
        </a>       
        @endforeach
    </div>    
</div>

<!-- Container End   -->   
</div>








    	
@endsection
@extends('layout.main')
  
@section('container')


<style type="text/css">
  .slick-prev,
  .slick-next {    
    background-color: grey;  
    width: 6vh;  
    height: 6vh;  
    border-radius: 50%;  
    top: 45%;
    transform: translateY(-50%);
  }
  .slick-slide {
    width: 35vw;
    box-sizing: border-box;
    padding: 1em
	}
 
</style>


@if(session()->has('sukses'))
<div class="alert alert-success d-flex align-items-center" role="alert">
    <p><i class="fa fa-check-circle" aria-hidden="true"></i>
    {{ session('sukses') }}
    </p>  
</div>
@endif

<div class="container">
	<div class="row mt-5">
		<div class="news2">
			<img src="img/layanan/banner event.jpg" class="img-fluid h-100 w-100 rounded">
			<img src="img/layanan/banner event2.jpg" class="img-fluid h-100 w-100 rounded">
			<img src="img/layanan/banner event3.jpg" class="img-fluid h-100 w-100 rounded">
		</div>		
	</div>
	<div class="row mt-5">
		<h3 class="text-success fw-bold ms-4">Event Pilihan Umum</h3>
		<div class="agen gap-1">
			@foreach($event as $e)
			<a href="/event/{{$e->id}}" class="text-decoration-none">
			<div class="card rounded" style="width:15rem">
				<img src="{{asset('storage/'.$e->gambar)}}" class="img-fluid">
				<h5 class="card-title text-center fw-bold my-2">{{ $e->nama_event }}</h5>
			</div>
			</a>
			@endforeach	
		</div>
	</div>

	<div class="row mt-5">
		<h3 class="text-success fw-bold ms-4">Event Terlaksana</h3>
		<div class="agen gap-1">
			@foreach($event as $e)
			<div class="card rounded" style="width:15rem">
				<img src="{{asset('storage/'.$e->gambar)}}" class="img-fluid">
				<h5 class="card-title text-center fw-bold my-2">{{ $e->nama_event }}</h5>
			</div>
			@endforeach	
		</div>
	</div>
	
	<div class="row justify-content-between text-success mt-5">
		<div class="col">
		<h3 class="text-success fw-bold ms-4">Gallery</h3>
		</div>
		<div class="col">
		<a href="/galeri" class="btn btn-sm btn-outline-success float-end mb-3">Selengkapnya <i class="fa fa-forward" aria-hidden="true"></i></a>
		</div>	
	</div>
	<div class="row mt-5">
	
	<div class="agen gap-1">
		@foreach($galeri as $e)
		<div class="card rounded h-100" style="width:15rem">
			<img src="{{asset('storage/'.$e->gambar)}}" class="img-fluid h-100 w-100">
		</div>
		@endforeach	
	</div>
	</div>
	
</div>







@endsection
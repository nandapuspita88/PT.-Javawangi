@extends('layout.main')
  
@section('container')

<div class="container">
	<div class="card text-center">
		<div class="card">
		  <img src="{{ asset('storage/'.$berita->gambar) }}" class="h-100 w-100 p-1">
		  <div class="card-body text-success">
		    <h5 class="card-title mb-2">{{ $berita->judul }}</h5>
		    <p class="card-text">{!! $berita->isi !!}</p>		    
		  </div>
		</div>
	</div>
	<div  class="row text-success">
		<h5>Berita Lainnya</h5>
		<p>Temukan Berita Menarik dan Menginspirasi lainnya di Javapedia</p>		
	</div>
	
		<div class="test">
		@foreach($semua as $berita)
		<div class="card text-success p-2 shadow" style="width: 18rem;">
		  <img src="{{asset('storage/'.$berita->gambar)}}" class="img-thumbnail" style="object-fit: cover;height: 15vw;width: 100%;">
		  <div class="card-body">
		    <h6 class="card-title"><strong>{{$berita->judul}}</strong></h6>		    
		    <a href="/news/{{ $berita->id }}">Baca Selengkapnya >></a>
		  </div>
		</div>
		@endforeach
		</div>
	
</div>

@endsection


@extends('layout.main')
  
@section('container')

<a href="/solusi" class="mb-3 btn btn-outline-success"><i class="fa fa-reply" aria-hidden="true"></i> Kembali</a>
<div class="container">
	<div class="card text-center">
		<div class="card">
		  <img src="{{ asset('storage/'.$solusi->gambar) }}" class="h-100 w-100 p-1">
		  <div class="card-body text-success">
		    <h5 class="card-title mb-2">{{ $solusi->judul }}</h5>
		    <p class="card-text">{!! $solusi->isi !!}</p>		    
		  </div>
		</div>
	</div>
	<div  class="row text-success">
		<h5>Berita Lainnya</h5>
		<p>Temukan Berita Menarik dan Menginspirasi lainnya di Javapedia</p>		
	</div>
	<div  class="d-flex flex-row gap-2">
		@foreach($berita as $berita)
		<div class="card text-success p-2 shadow" style="width: 18rem;">
		  <img src="{{ asset('storage/'.$berita->gambar) }}" class="card-img-top" alt="Jahe Busuk">
		  <div class="card-body">
		    <h6 class="card-title"><strong>{{$berita->judul}}</strong></h6>		    
		    <a href="/solusi/{{$berita->id}}">Baca Selengkapnya >></a>
		  </div>
		</div>
		@endforeach
	</div>
</div>

@endsection


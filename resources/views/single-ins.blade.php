@extends('layout.main')
  
@section('container')

<a href="/inspirasi" class="mb-3 btn btn-outline-success"><i class="fa fa-reply" aria-hidden="true"></i> Kembali</a>
<div class="container">
	<div class="card text-center">
		<div class="card">
		  <img src="{{ asset('storage/'.$ins->gambar) }}" class="img-fluid card-img-top h-100">
		  <div class="card-body text-success">
		    <h5 class="card-title mb-2">{{ $ins->judul }}</h5>
		    <p class="card-text">{!! $ins->isi !!}</p>		    
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
		  <img src="{{ asset('storage/'.$berita->gambar) }}" class="card-img-top img-fluid">
		  <div class="card-body">
		    <h6 class="card-title"><strong>{{$berita->judul}}</strong></h6>		    
		    <a href="/inspirasi/{{$berita->id}}">Baca Selengkapnya >></a>
		  </div>
		</div>
		@endforeach
	</div>
</div>
@endsection


@extends('layout.main')
  
@section('container')

<div class="container overflow-hidden">
	<form class="d-flex" role="search">
		<input class="form-control me-2" type="search" placeholder="Cari Hot News" aria-label="Search">
		<button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
	</form>

    <div class=" p-2 flex-row mt-3 border border-1 border-success shadow" style="height: 100px;">
    	<h5>Solusi Masalah</h5>
    	<h6 class="text-success"><strong>Temukan cara terbaik bersama Javawangi, untuk budidaya komoditas rempah dari mulai pra-taman, pemeliharaan hingga penjualan</strong></p>
    </div>




  <div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-md-3 g-4">
      	@foreach($solusi as $s)
        <div class="col">
          <div class="card shadow-sm" style="width: 25em">
            <img class="bd-placeholder-img p-2 image-fluid" src="{{ asset('storage/'.$s->gambar) }}">
            <div class="card-body">
            	<h5 class="card-title">{{ $s->judul }}</h5>
              <p class="card-text">Penulis: {{ $s->penulis }}</p>
              <p class="card-text"><small>Rilis Pada: {{ date('j F Y', strtotime($s->rilis)) }}</small></p>
              <p class="card-text">{!! $s->snap !!}</p>
              <a class="card-text" href="/solusi/{{ $s->id }}">Baca Selengkapnya...</a>              
            </div>
          </div>
        </div>
      	@endforeach
      </div>
    </div>
  </div>


</div>
</div>

@endsection
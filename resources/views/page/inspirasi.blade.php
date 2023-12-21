@extends('layout.main')
  
@section('container')

<div class="container overflow-hidden">
	<form class="d-flex" role="search">
		<input class="form-control me-2" type="search" placeholder="Cari Hot News" aria-label="Search">
		<button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
	</form>

    <div class=" p-3 flex-row mt-3 border-3 border-start border-success shadow">
      <h4 class="fw-bold">Inspirasi </h4>
      <h5 class="text-bg-success d-inline-block">Temukan lebih banyak hal menarik tentang cerita inspiratif di sekitar kita</h5>
    </div>




  <div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($ins as $s)
        <div class="col">
          <div class="card shadow-sm h-100">
            <img class="p-2 card-img-top" src="{{ asset('storage/'.$s->gambar) }}">
            <div class="card-body">
              <h5 class="card-title">{{ $s->judul }}</h5>
              <p class="card-text">Penulis: {{ $s->penulis }}</p>
              <p class="card-text"><small>Rilis Pada: {{ date('j F Y', strtotime($s->rilis)) }}</small></p>
              <p class="card-text">{!! $s->snap !!}</p>                            
            </div>
            <div class="card-footer">
              <a class="card-text" href="/inspirasi/{{ $s->id }}">Baca Selengkapnya...</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>


@endsection
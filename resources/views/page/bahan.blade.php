@extends('layout.main')
  
@section('container')

<div class="container overflow-hidden">
	<form class="d-flex" role="search">
		<input class="form-control me-2" type="search" placeholder="Cari Hot News" aria-label="Search">
		<button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
	</form>

    <div class=" p-3 flex-row mt-3 border-3 border-start border-success shadow">
    	<h4 class="fw-bold">Yuk, kenalan dengan ragam tanaman herbal Indonesia </h4>
    	<h5 class="text-bg-success">Temukan lebih banyak hal menarik tentang tanaman herbal di sekitar kita mulai dari jenis, kandungan hingga manfaat bagi manusia</h5>
    </div>




  <div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row g-1">
      	@foreach($gambar as $g)
        <div class="col-4">
        	<a href="bahan/{{ $g->id }}">
	          <div class="card shadow-sm" style="width: 25em;">
	            <img class="bd-placeholder-img card-img-top p-2 image-fluid" src="{{ asset('storage/'.$g->gambar) }}" >
	          </div>
      		</a>
        </div>
      	@endforeach
      </div>
    </div>
  </div>


</div>
</div>

@endsection
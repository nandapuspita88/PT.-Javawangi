@extends('layout.main')
  
@section('container')

<div class="container overflow-hidden">
	<form class="d-flex" role="search">
		<input class="form-control me-2" type="search" placeholder="Cari Komoditas" aria-label="Search">
		<button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
	</form>
  
    <div class=" p-2 flex-row mt-3 border border-1 border-success shadow" style="height: 100px;">
    	<h5>Javapedia</h5>
    	<h6 class="text-success"><strong>Temukan cara terbaik bersama Javawangi, untuk budidaya komoditas rempah dari mulai pra-taman, pemeliharaan hingga penjualan</strong></p>
    </div>




  <div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row g-1">
      	@foreach($produk as $produk)
        
        <div class="col-3">
            <a href="/javapedia/{{ $produk->slug }}" class="text-decoration-none">
          <div class="card shadow-sm text-center" style="width: 15em">
            <img class="bd-placeholder-img card-img-top p-2" width="100" height="200" src="{{asset('storage/'.$produk->gambar)}}">
            <div class="card-body text-bg-success">
            	<h5 class="card-title">{{$produk->komoditas }}</h5>
              	<p class="card-text">{!! $produk->deskripsi !!}</p>              
            </div>
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

@extends('layout.main')
  
@section('container')

<div class="container my-2" >
	
		<div class="card text-bg-dark">
		  <img src="img/Asset Foto Web Edukasi/6 Repository/Banner.jpeg" class="card-img image-fluid" style="max-height: 35vh">
		  <div class="card-img-overlay mt-5 ms-3">
		  	<h3 class="text-dark"><strong>Repository By Javawangi</strong></h3>
		    <h5 class="card-title text-bg-success d-inline-flex">The Best Journal All About Spices</h5>		    
		  </div>
		</div>
	
</div>
    
<form class="d-flex" role="search">
		<input class="form-control me-2" type="search" placeholder="Cari Hot News" aria-label="Search">
		<button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
</form>


 <div class="album py-5 mt-3">
    <div class="container">

      <div class="row g-3">
      	@foreach($repo as $repo)
        <div class="col-4">
        	<div class="card h-100" style="max-width: 540px;">
			  <div class="row g-0">
			    <div class="col-md-4">
			      <img src="{{ asset('storage/'.$repo->cover) }}" class="img-fluid rounded-start">
			    </div>
			    <div class="col-md-8 bg-success bg-gradient bg-opacity-50">
			      <div class="card-body ">
			        <h6 class="card-title">{{ $repo['judul'] }}</h6>
			        <a href="/download/{{ $repo->slug }}" class="btn btn-sm btn-secondary shadow text-success bg-light">Download</a>
			        <p><small>STKIP PGRI Jember | {{ date('Y', strtotime($repo->upload_at)) }}</small></p>
			        <p class="text-bg-success"><small>BUDIDAYA REMPAH</small></p>
			      </div>
			    </div>
			  </div>
			</div>
        </div>
      	@endforeach
      </div>
    </div>
  </div>





@endsection
@extends('layout.main')
  
@section('container')



<div class="container">
	<div class="card mx-auto text-bg-dark">
	  <img src="img/layanan/banner layanan.jpg" class="card-img img-fluid">
	  <div class="card-img-overlay ms-3 mt-auto d-flex">
	  	<div class="align-self-end">
		    <h5 class="card-title fw-bold">Meningkatkan Kesejahteraan dengan Bermitra Javawangi</h5>
		    <p class="card-text">Ayo ikut berkontribusi untuk meningkatkan perekonomian Indonesia</p>
		    <a href="/layanan/mitra" class="btn btn-light btn-md rounded-pill">Daftar Mitra</a>
		</div>    
	  </div>
	</div>
</div>
<h2 class="text-center text-success mt-5 fw-bold">Apa saja yang Javawangi Lakukan?</h2>
<p class="text-center text-success fw-semibold">
	Javawangi merampingkan rantai pasok produk pertanian dengan menghubungkan petani rempah skala kecil dengan pasar global dengan inovasi teknologi
</p>

<div class="container my-3">
<div class="carousel slide" id="franchise">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<div class="card mb-3">
			  <div class="row d-flex">		    
			    <div class="col-md-8">
			      <div class="card-body mt-5 ms-5 text-success">
			        <h5 class="card-title">Cari Franchise Terdekat</h5>
			        <p class="card-text">Fitur yang dapat membantu mancari franchise terdekat.</p>
			        <a href="layanan/franchise" class="btn btn-sm btn-success rounded-pill">Lihat Detail</a>
			      </div>
			    </div>
			    <div class="col-md-4">
			      <img src="img/layanan/cari franchise.jpg" class="img-fluid rounded-end">
			    </div>
			  </div>
			</div>
		</div>
		<div class="carousel-item">
			<div class="card mb-3">
			  <div class="row d-flex">		    
			    <div class="col-md-8">
			      <div class="card-body mt-5 ms-5 text-success">
			        <h5 class="card-title">Potensi Rempah</h5>
			        <p class="card-text">Lihat Potensi Rempah di Indonesia.</p>
			        <a href="layanan/rempah" class="btn btn-sm btn-success rounded-pill">Lihat Detail</a>
			      </div>
			    </div>
			    <div class="col-md-4">
			      <img src="img/layanan/cari franchise.jpg" class="img-fluid rounded-end">
			    </div>
			  </div>
			</div>
		</div>		
	</div>
</div>
</div>	

<div class="container mt-3">
<div class="row text-center mb-5">
	<div class="col">
		<div class="btn-group float-center" role="group">
			<a data-bs-target="#franchise" data-bs-slide="prev" class="btn text-success ink-offset-2 link-underline link-underline-opacity-0 me-3 fw-semibold">Cari Franchise</a>
			<a data-bs-target="#franchise" data-bs-slide="next" class=" btn text-success ink-offset-2 link-underline link-underline-opacity-0 me-3 fw-semibold">Potensi Rempah</a>
		</div>
	</div>
</div>
</div>

	<div class="row justify-content-between text-success">
		<div class="col">
		<h6>Informasi Agen</h6>
		</div>
		<div class="col">
		<a href="/layanan/list-agen" class="btn btn-sm btn-outline-success float-end mb-3">Selengkapnya <i class="fa fa-forward" aria-hidden="true"></i></a>
		</div>	
	</div>

	<div class="container">
		<div class="row">
			<div class="agen">
				@foreach($agen as $agen)
		          
		          <div class="card">
		              <a href="/layanan/list-agen/{{ $agen->slug }}" class="text-decoration-none text-dark">
		          	<img-wrapper>	
		            <img src="{{ asset('storage/'.$agen->gambar) }}" class="img-fluid" style="object-fit:cover;width:100%">
		        	</img-wrapper>
		            <div class="card-body" style="height:30vh;">
		              <h6 class="card-title">{{ $agen->nama_agen }}</h6>
		              <p><small>{{ date('j F Y', strtotime($agen->created_at)) }}</small></p>
		              <p class="card-text mb-3"><small>{!! $agen->alamat !!}</small></p>
		            </div>
		            <a href="https://maps.google.com/maps?ll=-8.216649,114.372096&z=20&t=m&hl=en-US&gl=US&mapclient=embed&q={!!  $agen->alamat !!}" class="mt-2 mb-3 me-2 float-end"><small>LIHAT PETA</small></a>
		          </a>
		          </div>
		          
		        @endforeach
			</div>			
		</div>
	</div>

<div  class="row gap-3 justify-content-between m-3 text-success fw-bold">
<h4>Javawangi Dalam Angka</h4> 
	<div class="col-md-5 shadow shadow-lg rounded border p-3 text-center" style="width: 25vh">		
		<h1>{{ $total_agen }} + </h1>
		<h5>Jumlah <br>Agen</h5>		    
	</div>
	<div class="col-md-5 shadow shadow-lg rounded border p-3 text-center" style="width: 25vh">		
		<h1>{{ $total_mitra }} + </h1>
		<h5>Jumlah <br>Mitra</h5>		    
	</div>
	<div class="col-md-5 shadow shadow-lg rounded border p-3 text-center" style="width: 25vh">		
		<h1>{{ $total_franchise }} + </h1>
		<h5>Jumlah <br>Franchise</h5>		    
	</div>
	<div class="col-md-5 shadow shadow-lg rounded border p-3 text-center" style="width: 25vh">		
		<h1>{{ $total_support }} + </h1>
		<h5>Jumlah <br>Sponsorship</h5>		    
	</div>
	<div class="col-md-5 shadow shadow-lg rounded border p-3 text-center" style="width: 25vh">		
		<h1>{{ $total_user }} + </h1>
		<h5>Jumlah <br>Pengguna</h5>		    
	</div>
</div>

<div class="container  my-5">
	<div class="row bg-secondary bg-gradient bg-opacity-50 justify-content-between text-center p-5">
		<div class="card" style="width: 16rem;">
		  <i class="fa fa-users card-img-top fa-4x p-3" aria-hidden="true"></i>
		  <div class="card-body">
		    <h5 class="card-title fw-bold">Fitur Event</h5>
		    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		    <a href="/event" class="btn btn-danger fw-bold">Umum</a>
		  </div>
		</div>
		<div class="card" style="width: 16rem;">
		  <i class="fa fa-bank card-img-top fa-4x p-3" aria-hidden="true"></i>
		  <div class="card-body">
		    <h5 class="card-title fw-bold">Fitur Universitas</h5>
		    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		    <a href="/event" class="btn btn-info fw-bold">Universitas</a>
		  </div>
		</div>
		<div class="card" style="width: 16rem;">
		  <i class="fa fa-graduation-cap card-img-top fa-4x p-3" aria-hidden="true"></i>
		  <div class="card-body">
		    <h5 class="card-title fw-bold">Fitur Sekolah</h5>
		    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		    <a href="/event" class="btn btn-warning fw-bold">Sekolah</a>
		  </div>
		</div>		
	</div>  
</div>
 
        
      

<style type="text/css">
  .slick-prev,
  .slick-next {    
    background-color: teal;  
    width: 6vh;  
    height: 6vh;  
    border-radius: 50%;  
    top: 45%;
    transform: translateY(-50%);
  }
  .slick-slide {
    width: 35rem;
    box-sizing: border-box;
    padding: 2em
	}
 
</style>


@endsection

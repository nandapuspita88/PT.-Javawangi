@extends('layout.main')
  
@section('container')

<div class="container">

<div class="row">
  <div id="HomeSlider" class="carousel carousel-dark slide" data-bs-ride="carousel">    
    <div class="carousel-inner d-flex">

      @foreach($banner as $b)
        <div class="carousel-item active">
            <img src="{{ asset('storage/'. $b->gambar) }}" class="d-block w-100 img-thumbnail">        
        </div>
      @endforeach
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#HomeSlider" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#HomeSlider" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>



<h3 class="text-success mt-5 mb-3 text-center"><strong>Promo Menarik</strong></h3>

<!-- Carousel Promo Menarik -->
<div class="row">  
<div class="test"> 
  @foreach($promo as $p)
    <a href="/promo/{{ $p->id }}" class="link-offset-2 link-underline link-underline-opacity-0">
    <div class="card">
        <img src="{{ asset('storage/'. $p->gambar) }}" class="img-card-top img-fluid">
      <div class="card-body">
        <h5 class="card-title" style="color:teal"><strong>{{ strtoupper($p->nama_promo) }}</strong></h5>
        <p class="card-text" style="color:grey"><small>*Syarat dan Ketentuan Promo Berlaku</small></p>
        <p class="card-text small" style="color:teal">Berlaku s/d {{ date('j F Y', strtotime($p->berlaku)) }}</p>
      </div>
    </div>
    </a>
  @endforeach 
</div>
</div>

      
    
  
<div class="d-grid gap-2 col-4 mx-auto my-5">
  <a class="btn btn-success" href="/promo">Promo Menarik</a> 
</div>


<h4 class="text-success my-5 mx-4"><strong>Keuntungan Kemitraan Java</strong></h4>

<div class="d-flex flex-row mb-4">
    <div class="btn-group col-md-4 mx-auto" role="group" aria-label="Basic radio toggle button group">      
      <label class="btn btn-outline-success p-2 rounded-pill" for="btnradio1">Petani</label>        
    </div>
</div>

<div class="row justify-content-center row-cols-1 row-cols-md-2 g-1 text-center">
  <div class="col" style="width: 30em">
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4 align-self-center">
          <img src="img/home/grafik.png" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Akses Informasi Pertanian</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>        
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col" style="width: 30em">
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4 align-self-center">
          <img src="img/home/grafik.png" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Meningkatakan Pendapatan</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>        
          </div>
        </div>
      </div>
    </div>
  </div> 
 
  <div class="col" style="width: 30em">
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4 align-self-center">
          <img src="img/home/grafik.png" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Pasar Online</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>        
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col" style="width: 30em">
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4 align-self-center">
          <img src="img/home/grafik.png" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Pelayanan Perizinan</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>        
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-5">
  <div class="p-5 mb-4 bg-body-tertiary text-center">
    <h4><strong>Visi Javawangi Untuk Meningkatkan Agrikultur Indonesia</strong></h4>
    <h5>Mewujudkan hilirisasi inovasi rempah organik yang berkelanjutan berbasis teknologi</h5>

    <h4 class="mt-5"><strong>Misi Javawangi Untuk Meningkatkan Agrikultur Indonesia</strong></h4>

    <div class="row row-cols-1 row-cols-md-4 g-4 mt-2">
    <div class="col">
      <div class="card h-100">
        <img src="img/home/farmer.png" class="card-img-top w-75 h-50 mx-auto">
        <div class="card-body">
          
          <p class="card-text fw-bold">Mewujudkan Kapasistas SDM mitra petani rempah yang terintegrasi</p>
        </div>
        
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img src="img/home/farmer.png" class="card-img-top w-75 h-50 mx-auto">
        <div class="card-body">
          
          <p class="card-text fw-bold">Mewujudkan Komoditas dan produktivitas rempah organik dengan melakikan hilirisasi berbasis nilai tambah</p>
        </div>
        
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img src="img/home/farmer.png" class="card-img-top w-75 h-50 mx-auto">
        <div class="card-body">
          
          <p class="card-text fw-bold">Mengoptimalkan Transformasi digital dengan mengikuti perkembangan zaman</p>
        </div>
        
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img src="img/home/farmer.png" class="card-img-top w-75 h-50 mx-auto">
        <div class="card-body">
          
          <p class="card-text fw-bold">Membangun daring pemasaran lokal maupun internasional</p>
        </div>
        
      </div>
    </div>
  </div>
  </div>
</div>

<h3 class="text-success mb-5 mx-4"><strong>Supported By</strong></h3>


<div class="row">

  <div class="sponsor gap-3 mx-auto" >
    @foreach($support as $s)
     <img src="{{ asset('storage/'. $s->gambar)}}" class="rounded" width="50" height="50">
    @endforeach
  </div>
  
</div>
</div>

<!-- Carousel Banner -->



<style type="text/css">
  .carousel-control-prev,
  .carousel-control-next,
  .slick-prev,
  .slick-next {
    
    background-color: teal;  
    width: 6vh;  
    height: 6vh;  
    border-radius: 50%;  
    top: 50%;
    transform: translateY(-50%);
  }

  .slick-slide {
    width: 35vw;    
    box-sizing: border-box;
    padding:1em;
  }
</style>

@endsection


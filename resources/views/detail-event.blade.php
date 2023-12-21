@extends('layout.main')
  
@section('container')

<style type="text/css">
  .slick-prev,
  .slick-next {    
    background-color: grey;  
    width: 6vh;  
    height: 6vh;  
    border-radius: 50%;  
    top: 45%;
    transform: translateY(-50%);
  }
  .slick-slide {
    width: 30vw;
    box-sizing: border-box;
    padding: 2em
	}
 
</style>



<div class="container mt-5">
	<a href="/event" class="btn btn-outline-success text-decoration-none"><i class="fa fa-reply" aria-hidden="true"></i> Kembali</a>
	<div class="row mt-3">
		<img src="{{asset('storage/'.$event->gambar)}}" class="h-50 rounded">
		<h1 class="m-5 text-center fw-bold">{{$event->nama_event}}</h1>
		<h3 class="fw-bold my-3">Tanggal Pelaksanaan</h3>
		<h3 class="mb-4">{{ date('j F Y', strtotime($event ->tgl)) }}</h3>
		<h3 class="fw-bold">Detail Event</h3>
		<p class="mb-4">{!! $event->detail !!}</p>
		<h3 class="fw-bold">Fasilitas</h3>
		<p>{!! $event->fasilitas !!}</p>		
	</div>

	<h3 class="fw-bold">Pendaftaran Event</h3>
	<div class="row bg-success bg-opacity-50 mt-3">
		<form action="/event/daftar" method="post" class="m-5">
			@csrf
			<div class="row mb-3">
			    <label for="nama" class="col-sm-2 col-form-label fw-bold">Nama Lengkap</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="nama" name="nama">
			    </div>
			</div>
			<div class="row mb-3">
			    <label for="instansi" class="col-sm-2 col-form-label fw-bold">Nama Instansi</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="instansi" name="instansi">
			    </div>
			</div>
			<div class="row mb-3">
			    <label for="alamat" class="col-sm-2 col-form-label fw-bold">Alamat</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="alamat" name="alamat">
			    </div>
			</div>
			<div class="row mb-3">
			    <label for="tlp" class="col-sm-2 col-form-label fw-bold">No.Telpon</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="tlp" name="tlp">
			    </div>
			</div>
			<input type="hidden" class="form-control" id="event_id" name="event_id" value="{{ $event->id }}">
			<div class="text-center mt-4">
				<button type="submit" class="btn btn-success btn-lg fw-bold rounded-pill">DAFTAR</button>				
			</div>	        
		</form>
	</div>

	<div class="row my-3">
		<h3 class="text-success fw-bold ms-3 mb-2">Event Lainnya</h3>
		<div class="agen">
			@foreach($semua as $e)
			<a href="/event/{{ $e->id }}" class="text-decoration-none">
			<div class="card rounded">
				<img src="{{asset('storage/'.$e->gambar)}}" class="img-fluid">
				<h5 class="card-title text-center fw-bold my-2">{{ $e->nama_event }}</h5>
			</div>
			</a>
			@endforeach	
		</div>
	</div>
</div>


@endsection
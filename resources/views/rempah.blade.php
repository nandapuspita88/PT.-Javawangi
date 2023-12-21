@extends('layout.main')
  
@section('container')



<div class="container my-3">
	<div class="col">
        <a href="/layanan" class="mb-3 btn btn-sm btn-outline-success float-start"><i class="fa fa-reply" aria-hidden="true"></i> Kembali</a>
    </div>
    <h1 class="text-success text-center mt-5 fw-bold">POTENSI REMPAH</h1>
    
    @foreach($rempah as $rempah)
	<div class="row mb-5">
		<h3 class="mb-3 text-success">Data Rempah di Indonesia</h3>
		<img src="{{ asset('storage/'.$rempah->data) }}" class="img-thumbnail img-fluid">
	</div>
	<div class="row mb-5">
		<h3 class="mb-3 text-success">Potensi Rempah Terbaik</h3>
		<img src="{{ asset('storage/'.$rempah->potensi) }}" class="img-thumbnail">
	</div>
	<div class="row">
		<h3 class="mb-3 text-success">Potensi Ekspor Rempah</h3>
		<img src="{{ asset('storage/'.$rempah->ekspor) }}" class="img-thumbnail">
	</div>
	@endforeach
</div>


@endsection
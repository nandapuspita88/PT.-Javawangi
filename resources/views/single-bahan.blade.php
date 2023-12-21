@extends('layout.main')

@section('container')


<div class="container">
	
     <div class=" p-3 flex-row mt-3 border-3 border-start border-success shadow">
    	<h4 class="fw-bold">Yuk, kenalan dengan ragam tanaman herbal Indonesia </h4>
    	<h5 class="text-bg-success">Temukan lebih banyak hal menarik tentang tanaman herbal di sekitar kita mulai dari jenis, kandungan hingga manfaat bagi manusia</h5>
    </div>
   

	<div class="row text-center mt-3 mx-auto mb-5 shadow shadow-3">
		<img src="{{ asset('storage/'. $gambar->gambar) }}" class="img-fluid img-thumbnail">
	</div>
</div>





@endsection
@extends('layout.main')

@section('container')


<div class="container p-3">
	<a href="/layanan/list-agen" class="mb-3 btn btn-outline-success"><i class="fa fa-reply" aria-hidden="true"></i> Kembali</a>
	<div class="row justify-content-center">		
		<div class="card mb-3 w-100 h-100">
		  <div class="row g-0">
		    <div class="col-md-4 p-3 text-center">
		      	<img src="{{ asset('storage/'.$agen->gambar) }}" class="img-fluid rounded-start">
				<h5 class="card-title my-4 fw-bold">{{ $agen->nama_agen }}</h5>
				<p class="card-text">{!! $agen->alamat !!}</p>
		    </div>
		    <div class="col-md-8">
		      	<div class="card-body">
				  <div class="mapouter border border-3 overflow-hidden ratio ratio-16x9">
						<div class="gmap_canvas"> 
							<iframe src="https://maps.google.com/maps?q={!! $agen->alamat !!}&amp;t=&amp;z=20&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" style="width: 100%; height: 100%;">
							</iframe>
							<style>
							.mapouter{position:relative;height:400px;width:700px;background:#fff;} 
							.maprouter a{color:#fff !important;position:absolute !important;top:0 !important;z-index:0 !important;}
							</style>
						
							<style>
								.gmap_canvas{overflow:hidden;height:400px;width:700px}.gmap_canvas iframe{position:relative;z-index:2}
							</style>
						</div>
					</div>								       
		      </div>			  
		    </div>
		  </div>
		</div>
	</div>
</div>


@endsection
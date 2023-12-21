@extends('layout.main')
  
@section('container')


<div class="container p-3">
     <div class="col">
        <a href="/layanan" class="mb-3 btn btn-sm btn-outline-success float-start"><i class="fa fa-reply" aria-hidden="true"></i> Kembali</a>
    </div>    
    <h3 class="text-center fw-bold p-2 text-success mx-auto">Daftar Agen Javawangi</h3>
    


    <div class="row row-cols-1 row-cols-lg-4 g-4">
        @foreach($agen as $agen)        
        <div class="col-md-4">
            <div class="card">
		              <a href="/layanan/list-agen/{{ $agen->slug }}" class="text-decoration-none text-dark">
		          	<img-wrapper>	
		            <img src="{{ asset('storage/'.$agen->gambar) }}" class="img-fluid" style="height:30vh;">
		        	</img-wrapper>
		            <div class="card-body" style="height:30vh;">
		              <h6 class="card-title">{{ $agen->nama_agen }}</h6>
		              <p><small>{{ date('j F Y', strtotime($agen->created_at)) }}</small></p>
		              <p class="card-text mb-3"><small>{!! $agen->alamat !!}</small></p>
		            </div>
		            <a href="https://maps.google.com/maps?ll=-8.216649,114.372096&z=20&t=m&hl=en-US&gl=US&mapclient=embed&q={!!  $agen->alamat !!}" class="mt-2 mb-3 me-2 ms-auto float-end"><small>LIHAT PETA</small></a>
		          </a>
		          </div>        
        </div>
        @endforeach    
    </div>
</div>




@endsection
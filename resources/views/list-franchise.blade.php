@extends('layout.main')
  
@section('container')


<div class="container p-3">
    <div class="col">
        <a href="/layanan" class="mb-3 btn btn-sm btn-outline-success float-start"><i class="fa fa-reply" aria-hidden="true"></i> Kembali</a>
    </div>    
    <h3 class="text-center fw-bold p-2 text-success mx-auto mb-5">Daftar Franchise Javawangi</h3>


    <div class="container">
        <div class="row g-1 justify-content-between">
        @foreach($franchise as $p)        
        <div class="col-5">
            <div class="card mb-3 h-100 w-100 border border-3 border-success">
              <div class="row g-0">
                <div class="col-md-4 p-2">
                  <img src="{{ asset('storage/'.$p->gambar) }}" class="img-fluid rounded-start h-100">
                </div>
                <div class="col-md-8">
                  <div class="card-body ">
                    <h6 class="card-title">{{ $p->nama_franchise }}</h6>
                    <p class="card-text">{!! $p->alamat !!}</p>
                    <p>Jam Buka : {{ $p->jam_buka }}</p>
                    <p>{{ date('j F Y', strtotime($p->created_at)) }}</p>
                  </div>
                  <a href="https://maps.google.com/maps?ll=-8.216649,114.372096&z=20&t=m&hl=en-US&gl=US&mapclient=embed&q={!!  $p->alamat !!}" class="mb-5 ms-5 text-start">Lihat Map...</a>
                </div>
              </div>
            </div>
        </div>
        @endforeach    
        </div>
    </div>
</div>



@endsection
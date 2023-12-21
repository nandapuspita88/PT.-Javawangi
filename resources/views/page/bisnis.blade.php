@extends('layout.main')
  
@section('container')

<div class="container my-4">
	<div class="card mx-auto text-bg-dark mb-5">
	  <img src="img/Assets_Bussines/banner.png" class="card-img img-fluid">	 
	</div>
    <h3 class="mb-3">Our Best Product</h3>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        
        @foreach($produk as $p)
        <div class="col">
            <a href="/bisnis/{{ $p->slug }}" class="link-offset-2 link-underline link-underline-opacity-0">
            <div class="card h-100">
            <img src="{{ asset('storage/' . $p->gambar) }}" class="card-img-top img-thumbnail img-fluid">
            <div class="card-body text-dark">
                <h5 class="card-title">Rp. {{ $p->harga }}</h5>
                
            </div>
            <div class="card-footer text-center">
                <h4>{{ $p->nama_produk }}</h4>
            </div>
            </div>
            </a>        
        </div>
        @endforeach   
    
    </div>
</div>

@endsection




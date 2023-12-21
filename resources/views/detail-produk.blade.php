@extends('layout.main')

@section('container')


<div class="container">
	<div class="row justify-content-center">		
		<div class="card mb-3 w-100 h-100">
		  <div class="row g-0">
		    <div class="col-md-4 p-3 text-center">
		      	<img src="{{ asset('storage/'.$produk->gambar) }}" class="img-fluid rounded-start">			  	
				<form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $produk->id }}" name="id">
                    <input type="hidden" value="{{ $produk->nama_produk }}" name="name">
                    <input type="hidden" value="{{ $produk->harga }}" name="price">
                    <input type="hidden" value="{{ $produk->gambar }}"  name="image">
                    <input type="hidden" value="1" name="quantity">
                    <button class="btn btn-info rounded mt-3">Add to Cart</button>
                    <a href="/bisnis" class="btn btn-danger rounded mt-3" role="button">Cancel</a>
                </form>
		    </div>
		    <div class="col-md-8">
		        <div class="row">
		            <div class="card-body">
					<h3 class="card-title mb-4 fw-bold">{{ $produk->nama_produk }}</h3>
					<p class="card-text">{!! $produk->deskripsi !!}</p>									       
		            </div>
		        </div>
		      	
		      <div class="row align-self-bottom">
		          <div class="col">
		              <h4>Rp. {{ $produk->harga }}</h4>
		          </div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</div>


@endsection
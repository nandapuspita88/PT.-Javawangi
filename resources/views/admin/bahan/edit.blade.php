@extends('admin.main')
@section('container')

<style>
    trix-toolbar[data-trix-button-group="attachment"]{
        display:none;
    }
</style>

<div class="container my-3">
    <h3 class="my-3 text-center">Edit Promo</h3>
    <form action="/admin/bahan/{{ $bahan->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
    
        <div class="row mb-3">        
            <label for="gambar" class="col-sm-2 col-form-label">Gambar Bahan</label>
            <!-- <img class="img-preview img-fluid mb-3 col-sm-5"> -->
            <div class="col-sm-10">
                <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewImg()">        
            </div>
        </div>
        <a href="/admin/bahan" class="btn btn-danger  float-end">Batal</a>      
        <button type="submit" class="btn btn-primary float-end me-3">Simpan</button>    
    </form>   
</div>



@endsection
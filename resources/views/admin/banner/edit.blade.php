@extends('admin.main')
@section('container')

<style>
    trix-toolbar[data-trix-button-group="attachment"]{
        display:none;
    }
</style>

<div class="container my-3">
    <h3 class="my-3 text-center">Edit Promo</h3>
    <form action="/admin/banner/{{ $banner->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
    
        <div class="row mb-3">        
            <label for="gambar" class="col-sm-2 col-form-label">Gambar Banner</label>
            <!-- <img class="img-preview img-fluid mb-3 col-sm-5"> -->
            <div class="col-sm-10">
                <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewImg()">        
            </div>
        </div>
        <a href="/admin/banner" class="btn btn-danger  float-end">Batal</a>      
        <button type="submit" class="btn btn-primary float-end me-3">Simpan</button>    
    </form>   
</div>

<script>
    const nama_agen = document.querySelector('#nama_agen');
    const slug = document.querySelector('#slug');


    nama.addEventListener('change',function(){
        fetch('/admin/bisnis/CekSlug?nama_agen='+ nama_agen.value)
            .then (response => response.json())
            .then (data => slug.value = data.slug)
    });
</script>


@endsection
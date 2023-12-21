@extends('admin.main')
@section('container')

<style>
    trix-toolbar[data-trix-button-group="attachment"]{
        display:none;
    }
</style>

<div class="container my-3">
    <h3 class="my-3 text-center">Edit Data Agen</h3>
    <form action="/admin/agen/{{ $agen->slug }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
    <div class="row mb-3">
        <label for="nama_agen" class="col-sm-2 col-form-label">Nama Agen</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama_agen" name="nama_agen" value="{{ old('nama_agen',$agen->nama_agen) }}" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="slug" class="col-sm-2 col-form-label">Slug</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug',$agen->slug) }}" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">  
        <input id="alamat" type="hidden" name="alamat" value="{{ old('alamat',$agen->alamat) }}" required>
        <trix-editor input="alamat" class="trix-content"></trix-editor>
        </div>
    </div>
    <div class="row mb-3">
        <label for="gambar" class="col-sm-2 col-form-label">Gambar Produk</label>
        <div class="col-sm-10">
            <input class="form-control" type="file" id="gambar" name="gambar" value="{{ old('gambar',$agen->gambar) }}">
            <input class="form-control" type="hidden" value="{{ $agen->gambar }}" name="oldImage">           
        </div>
    </div>  
    <a href="/admin/agen" class="btn btn-danger  float-end">Batal</a>      
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
@extends('admin.main')
@section('container')

<style>
    trix-toolbar[data-trix-button-group="attachment"]{
        display:none;
    }
</style>

<div class="container my-3">
    <h3 class="my-3 text-center">Komoditas Baru</h3>
    <form action="/admin/javapedia" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Nama Komoditas</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="komoditas" name="komoditas">
        </div>
    </div>
    <div class="row mb-3">
        <label for="slug" class="col-sm-2 col-form-label">Slug</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="slug" name="slug">
        </div>
    </div>
    <div class="row mb-3">        
        <label for="gambar" class="col-sm-2 col-form-label">Gambar Komoditas</label>
        <!-- <img class="img-preview img-fluid mb-3 col-sm-5"> -->
        <div class="col-sm-10">
            <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewImg()">        
        </div>
    </div>
    <div class="row mb-3">
        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
        <div class="col-sm-10">  
        <input id="deskripsi" type="hidden" name="deskripsi">
        <trix-editor input="deskripsi" class="trix-content"></trix-editor>
        </div>
    </div>      
    <a href="/admin/javapedia" class="btn btn-danger  float-end">Batal</a>      
    <button type="submit" class="btn btn-primary float-end me-3">Simpan</button>
</form>   
</div>

<!-- <script>
    const komoditas = document.querySelector('#komoditas');
    const slug = document.querySelector('#slug');


    nama.addEventListener('change',function(){
        fetch('/admin/bisnis/CekSlug?komoditas='+ komoditas.value)
            .then (response => response.json())
            .then (data => slug.value = data.slug)
    });

    function previewImg(){
        const gambar = document.querySelector('#gambar');
        const preview = document.querySelector('.img-preview');

        preview.style.display:'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar.file[0]);

        oFReader.onload = function (oFREvent){
            preview.src = oFREvent.target.result;
        }
    }
    
</script> -->


@endsection
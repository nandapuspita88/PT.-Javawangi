@extends('admin.main')
@section('container')

<style>
    trix-toolbar[data-trix-button-group="attachment"]{
        display:none;
    }
</style>

<div class="container my-3">
    <h3 class="my-3 text-center">Form Tambah Produk Baru</h3>
    <form action="/admin/bisnis" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama_produk" name="nama_produk">
        </div>
    </div>
    <div class="row mb-3">
        <label for="slug" class="col-sm-2 col-form-label">Slug</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="slug" name="slug">
        </div>
    </div>
    <div class="row mb-3">
        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="harga" name="harga">
        </div>
    </div>
    <div class="row mb-3">        
        <label for="gambar" class="col-sm-2 col-form-label">Gambar Produk</label>
        <!-- <img class="img-preview img-fluid mb-3 col-sm-5"> -->
        <div class="col-sm-10">
            <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewImg()">        
        </div>
    </div>
    <div class="row mb-3">
        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Produk</label>
        <div class="col-sm-10">  
        <input id="deskripsi" type="hidden" name="deskripsi">
        <trix-editor input="deskripsi" class="trix-content"></trix-editor>
        </div>
    </div>      
    <a href="/admin/bisnis" class="btn btn-danger  float-end">Batal</a>      
    <button type="submit" class="btn btn-primary float-end me-3">Simpan</button>
</form>   
</div>




<script>
    // const nama_produk = document.querySelector('#nama_produk');
    // const slug = document.querySelector('#slug');
    
    // nama_produk.addEventListener('change', function(){
    //     fetch('/admin/bisnis/CekSlug?nama_produk=' + nama_produk.value)
    //         .then (response => response.json())
    //         .then (data => slug.value = data.slug)
    // });

    // function previewImg(){
    //     const gambar = document.querySelector('#gambar');
    //     const preview = document.querySelector('.img-preview');

    //     preview.style.display ='block';

    //     const oFReader = new FileReader();
    //     oFReader.readAsDataURL(gambar.file[0]);

    //     oFReader.onload = function (oFREvent){
    //         preview.src = oFREvent.target.result;
    //     };
    // };
    
</script>



@endsection
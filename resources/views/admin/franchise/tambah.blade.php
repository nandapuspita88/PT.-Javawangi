@extends('admin.main')
@section('container')

<style>
    trix-toolbar[data-trix-button-group="attachment"]{
        display:none;
    }
</style>

<div class="container my-3">
    <h3 class="my-3 text-center">Tambah Franchise Baru</h3>
    <form action="/admin/franchise" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row mb-3">
        <label for="nama_franchise" class="col-sm-2 col-form-label">Nama Franchise</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama_franchise" name="nama_franchise">
        </div>
    </div>
    <div class="row mb-3">
        <label for="jam_buka" class="col-sm-2 col-form-label">Jam Buka</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="jam_buka" name="jam_buka">
        </div>
    </div>
    <div class="row mb-3">        
        <label for="gambar" class="col-sm-2 col-form-label">Foto Franchise</label>
        <!-- <img class="img-preview img-fluid mb-3 col-sm-5"> -->
        <div class="col-sm-10">
            <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewImg()">        
        </div>
    </div>
    <div class="row mb-3">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">  
        <input id="alamat" type="hidden" name="alamat">
        <trix-editor input="alamat" class="trix-content"></trix-editor>
        </div>
    </div>
    <a href="/admin/franchise" class="btn btn-danger  float-end">Batal</a>      
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
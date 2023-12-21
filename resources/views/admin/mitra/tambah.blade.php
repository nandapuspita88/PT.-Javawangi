@extends('admin.main')
@section('container')

<style>
    trix-toolbar[data-trix-button-group="attachment"]{
        display:none;
    }
</style>

<div class="container my-3">
    <h3 class="my-3 text-center">Mitra Baru</h3>
    <form action="/admin/mitra" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row mb-3">
        <label for="nama_mitra" class="col-sm-2 col-form-label">Nama Mitra</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama_mitra" name="nama_mitra">
        </div>
    </div>
    <div class="row mb-3">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="alamat" name="alamat">
        </div>
    </div>
    <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="email">
        </div>
    </div>
    <div class="row mb-3">
        <label for="telp" class="col-sm-2 col-form-label">No.Telp</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="telp" name="telp">
        </div>
    </div>
    <div class="row mb-3">
        <label for="jenis" class="col-sm-2 col-form-label">Jenis Mitra</label>
        <div class="col-sm-10">
        <select class="col-sm-10 form-control" aria-label="Default select example" id="jenis" name="jenis">
            <option selected>Pilih Jenis Mitra</option>
            <option value="Agen">Agen</option>
            <option value="Member">Member</option>
            <option value="Sponsorship">Sponsorship</option>
            <option value="Franchise">Franchise</option>
            <option value="Mitra Tani">Petani</option>                
        </select>
        </div>    
    </div>
    <div class="row mb-3">        
        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
        <!-- <img class="img-preview img-fluid mb-3 col-sm-5"> -->
        <div class="col-sm-10">
            <input class="form-control" type="file" id="fotor" name="foto" onchange="previewImg()">        
        </div>
    </div>
          
    <a href="/admin/mitra" class="btn btn-danger  float-end">Batal</a>      
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
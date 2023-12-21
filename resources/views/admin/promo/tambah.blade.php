@extends('admin.main')

@section('container')
@section('plugins.TempusDominusBs4', true)

<style>
    trix-toolbar[data-trix-button-group="attachment"]{
        display:none;
    }
</style>

<div class="container my-3">
    <h3 class="my-3 text-center">Tambah Promo Baru</h3>
    <form action="/admin/promo" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row mb-3">
        <label for="nama_promo" class="col-sm-2 col-form-label">Nama Promo</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama_promo" name="nama_promo">
        </div>
    </div>    
    <div class="row mb-3">        
        <label for="gambar" class="col-sm-2 col-form-label">Gambar Promo</label>
        <!-- <img class="img-preview img-fluid mb-3 col-sm-5"> -->
        <div class="col-sm-10">
            <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewImg()">        
        </div>
    </div>
    <div class="row mb-3">
        <label for="berlaku" class="col-sm-2 col-form-label">Berlaku Hingga</label>
        <div class="col-sm-10">
            @php
            $config = ['format' => 'YYYY-MM-DD'];
            @endphp
            <x-adminlte-input-date name="berlaku" :config="$config" placeholder="Choose a date...">
                <x-slot name="appendSlot">
                    <div class="input-group-text bg-gradient-danger">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-date>
        </div>
    </div>
    <div class="row mb-3">
        <label for="keterangan" class="col-sm-2 col-form-label">Detail Promo</label>
        <div class="col-sm-10">  
        <input id="keterangan" type="hidden" name="keterangan">
        <trix-editor input="keterangan" class="trix-content"></trix-editor>
        </div>
    </div>
    <a href="/admin/promo" class="btn btn-danger  float-end">Batal</a>      
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
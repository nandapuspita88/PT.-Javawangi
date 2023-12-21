@extends('admin.main')
@section('container')

<style>
    trix-toolbar[data-trix-button-group="attachment"]{
        display:none;
    }
</style>

<div class="container my-3">
    <h3 class="my-3 text-center">Edit Event</h3>
    <form action="/admin/event/{{ $event->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
    <div class="row mb-3">
        <label for="nama_event" class="col-sm-2 col-form-label">Nama Event</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama_event" name="nama_event" value="{{ old('nama_event',$event->nama_event) }}">
        </div>
    </div>    
    <div class="row mb-3">        
        <label for="gambar" class="col-sm-2 col-form-label">Gambar Event</label>
        <!-- <img class="img-preview img-fluid mb-3 col-sm-5"> -->
        <div class="col-sm-10">
            <input class="form-control" type="hidden" value="{{ old('gambar',$event->gambar) }}" name="oldImage">
            <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewImg()">        
        </div>
    </div>
    <div class="row mb-3">
        <label for="tgl" class="col-sm-2 col-form-label">Tanggal Pelaksanaan</label>
        <div class="col-sm-10">
            @php
            $config = ['format' => 'YYYY-MM-DD'];
            @endphp
            <x-adminlte-input-date name="tgl" :config="$config" placeholder="Choose a date...">
                <x-slot name="appendSlot">
                    <div class="input-group-text bg-gradient-danger">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-date>
        </div>
    </div>
    <div class="row mb-3">
        <label for="detail" class="col-sm-2 col-form-label">Detail Event</label>
        <div class="col-sm-10">  
        <input id="detail" type="hidden" name="detail" value="{{ old('detail',$event->detail) }}">
        <trix-editor input="detail" class="trix-content"></trix-editor>
        </div>
    </div>
    <div class="row mb-3">
        <label for="fasilitas" class="col-sm-2 col-form-label">Fasilitas</label>
        <div class="col-sm-10">  
        <input id="fasilitas" type="hidden" name="fasilitas" value="{{ old('fasilitas',$event->fasilitas) }}">
        <trix-editor input="fasilitas" class="trix-content"></trix-editor>
        </div>
    </div>
    <a href="/admin/event" class="btn btn-danger  float-end">Batal</a>      
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
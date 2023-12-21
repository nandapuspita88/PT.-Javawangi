
@extends('admin.main')
@section('container')


<div class="container my-3">
    <h3 class="my-3 text-center">Edit Artikel</h3>
    <form action="/admin/ins/{{ $ins->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
    <div class="row mb-3">
        <label for="judul" class="col-sm-2 col-form-label">Judul Artikel</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul',$ins->judul) }}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="penulis" name="penulis" value="{{ old('penulis',$ins->penulis) }}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="rilis" class="col-sm-2 col-form-label">Tanggal Rilis</label>
        <div class="col-sm-10">
            @php
            $config = ['format' => 'YYYY-MM-DD'];
            @endphp
            <x-adminlte-input-date name="rilis" :config="$config" placeholder="Choose a date..." value="{{ old('rilis',$ins->rilis) }}">
                <x-slot name="appendSlot">
                    <div class="input-group-text bg-gradient-danger">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-date>
        </div>
    </div>
    <div class="row mb-3">        
        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
        <!-- <img class="img-preview img-fluid mb-3 col-sm-5"> -->
        <div class="col-sm-10">
            <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewImg()" value="{{ old('gambar',$ins->gambar) }}">        
        </div>
    </div>
    <div class="row mb-3">
        <label for="isi" class="col-sm-2 col-form-label">Isi Artikel</label>
        <div class="col-sm-10">  
        <input id="isi" type="hidden" name="isi" value="{{ old('isi',$ins->isi) }}">
        <trix-editor input="isi" class="trix-content"></trix-editor>
        </div>
    </div>  
    <a href="/admin/ins" class="btn btn-danger  float-end">Batal</a>      
    <button type="submit" class="btn btn-primary float-end me-3">Simpan</button>
</form>   
</div>




@endsection
@extends('admin.main')
@section('container')

<style>
    trix-toolbar[data-trix-button-group="attachment"]{
        display:none;
    }
</style>

<div class="container my-3">
    <h3 class="my-3 text-center">Edit Data Franchise</h3>
    <form action="/admin/franchise/{{ $franchise->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
    <div class="row mb-3">
        <label for="nama_franchise" class="col-sm-2 col-form-label">Nama franchise</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nama_franchise" name="nama_franchise" value="{{ old('nama_franchise',$franchise->nama_franchise) }}" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="jam_buka" class="col-sm-2 col-form-label">Jam Buka</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="jam_buka" name="jam_buka" value="{{ old('jam_buka',$franchise->jam_buka) }}" required>
        </div>
    </div>    
    <div class="row mb-3">
        <label for="gambar" class="col-sm-2 col-form-label">Gambar Franchise</label>
        <div class="col-sm-10">
            <input class="form-control" type="file" id="gambar" name="gambar" value="{{ old('gambar',$franchise->gambar) }}">
            <input class="form-control" type="hidden" value="{{ $franchise->gambar }}" name="oldImage">           
        </div>
    </div>
    <div class="row mb-3">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">  
        <input id="alamat" type="hidden" name="alamat" value="{{ old('alamat',$franchise->alamat) }}" required>
        <trix-editor input="alamat" class="trix-content"></trix-editor>
        </div>
    </div>  
    <a href="/admin/franchise" class="btn btn-danger  float-end">Batal</a>      
    <button type="submit" class="btn btn-primary float-end me-3">Simpan</button>
</form>   
</div>



@endsection
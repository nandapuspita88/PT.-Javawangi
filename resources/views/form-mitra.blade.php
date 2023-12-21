@extends('layout.main')
@section('container')


@if(session()->has('sukses'))
<div class="alert alert-success d-flex align-items-center" role="alert">
    <p>{{ session('sukses') }}</p>  
</div>
@endif


<div class="row d-flex mt-5">
        <div class="col">
            <a href="/layanan" class="mb-3 btn btn-sm btn-outline-success float-start"><i class="fa fa-reply" aria-hidden="true"></i> Kembali</a>
        </div>    
        <h3 class="text-center fw-bold p-2 text-success mx-auto">Form Pendaftaran Mitra</h3>

<div class="container my-5 bg-body-tertiary border rounded-2 shadow shadow-3">  

    <form action="/layanan/mitra" method="post" class="row g-3 p-2" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="nama_mitra" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_mitra" name="nama_mitra">
        </div>
        <div class="col-md-6">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat">
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="col-md-6">
            <label for="telp" class="form-label">No.Telp</label>
            <input type="text" class="form-control" id="telp" name="telp">
        </div>
        <div class="col-md-6">
            <label for="jenis" class="form-label">Jenis Mitra</label>
            <select class="form-select" aria-label="Default select example" id="jenis" name="jenis">
                <option selected></option>
                <option value="Agen">Agen</option>
                <option value="Member">Member</option>
                <option value="Sponsorship">Sponsorship</option>
                <option value="Franchise">Franchise</option>
                <option value="Mitra Tani">Petani</option>                
            </select>
        </div>
        <div class="col-md-6">
            <label for="foto" class="form-label">Foto Profil</label>
            <input class="form-control" type="file" id="foto" name="foto">
        </div>
        <div class="text-center">            
            <button class="btn btn-success my-4 float-end" type=""submit><i class="fa fa-save" aria-hidden="true"></i> SIMPAN</button>            
        </div>        
    </form>
</div>

<div class="container bg-body-tertiary shadow shadow-3">
    <div class="p-5 mb-4 rounded-3">
        <div class="container-fluid text-success py-3 px-3">
            <h1 class="display-5 fw-bold ">Hubungi Kami</h1>
            <h5 class="fs-4 mb-5">Anda Dapat Menghubungi Kami untuk Menjadi Mitra Javawangi</h5>            
                <button class="col-md-5 btn btn-success btn-lg text-start" type="button"><i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i> Hubungi Admin Javawangi</button>
                <button class="col-md-5 btn btn-success btn-lg text-start" type="button"><i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i> ptjavawangiindonesia@gmail.com</button>                
        </div>
    </div>
</div>
    

@endsection
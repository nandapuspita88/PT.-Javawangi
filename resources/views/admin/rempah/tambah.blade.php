@extends('admin.main')

@section('container')




<div class="container my-3">
    <h3 class="my-3 text-center">Tambah Potensi Rempah</h3>
    <form action="/admin/rempah" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row mb-3">        
        <label for="data" class="col-sm-2 col-form-label">Data Rempah Indonesia</label>
        <!-- <img class="img-preview img-fluid mb-3 col-sm-5"> -->
        <div class="col-sm-10">
            <input class="form-control" type="file" id="data" name="data">        
        </div>
    </div>
    <div class="row mb-3">        
        <label for="potensi" class="col-sm-2 col-form-label">Potensi Rempah Terbaik</label>
        <!-- <img class="img-preview img-fluid mb-3 col-sm-5"> -->
        <div class="col-sm-10">
            <input class="form-control" type="file" id="potensi" name="potensi">        
        </div>
    </div>
    <div class="row mb-3">        
        <label for="ekspor" class="col-sm-2 col-form-label">Potensi Ekspor Rempah</label>
        <!-- <img class="img-preview img-fluid mb-3 col-sm-5"> -->
        <div class="col-sm-10">
            <input class="form-control" type="file" id="ekpsor" name="ekspor">        
        </div>
    </div>
   
   
    <a href="/admin/rempah" class="btn btn-danger  float-end">Batal</a>      
    <button type="submit" class="btn btn-primary float-end me-3">Simpan</button>    
</form>   
</div>




@endsection
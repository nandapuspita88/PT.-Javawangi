@extends('admin.main')
@section('container')

<style>
    trix-toolbar[data-trix-button-group="attachment"]{
        display:none;
    }
</style>

<div class="container my-3">
    <h3 class="my-3 text-center">Edit User</h3>
    <form action="/admin/user/{{$user->id}}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Nama User</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="{{old('name',$user->name)}}">
        </div>
    </div>
    
    <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="email" value="{{old('email',$user->email)}}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="password" name="password" value="{{old('password',$user->password)}}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="role" class="col-sm-2 col-form-label">Role User</label>
        <div class="col-sm-10">
        <select class="col-sm-10 form-control" aria-label="Default select example" id="role" name="role" value="{{old('role',$user->role)}}"
            <option selected>Pilih Role</option>
            <option value="1">Admin</option>
            <option value="2">User</option>                
        </select>
        </div>    
    </div>
    
          
    <a href="/admin/user" class="btn btn-danger  float-end">Batal</a>      
    <button type="submit" class="btn btn-primary float-end me-3">Simpan</button>
</form>   
</div>


@endsection
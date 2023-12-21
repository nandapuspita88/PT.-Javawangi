@extends('admin.main')
@section('container')



<div class="container my-3">
    <h3 class="my-3 text-center">Edit Jurnal</h3>
    <form action="/admin/repo/{{ $repo->slug }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
    <div class="row mb-3">
        <label for="judul" class="col-sm-2 col-form-label">Judul Jurnal</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul',$repo->judul) }}">
        </div>
    </div>
    <!--<div class="row mb-3">-->
    <!--    <label for="slug" class="col-sm-2 col-form-label">Slug</label>-->
    <!--    <div class="col-sm-10">-->
    <!--    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug',$repo->slug) }}">-->
    <!--    </div>-->
    <!--</div>-->
    <div class="row mb-3">
        <label for="cover" class="col-sm-2 col-form-label">Cover Jurnal</label>
        <div class="col-sm-10">
            <input class="form-control" type="file" id="cover" name="cover">
            <input class="form-control" type="hidden" value="{{ old('cover',$repo->cover) }}" name="oldImage">           
        </div>
    </div>
    <div class="row mb-3">
        <label for="file" class="col-sm-2 col-form-label">File Jurnal</label>
        <div class="col-sm-10">
            <input class="form-control" type="file" id="file" name="file">
            <input class="form-control" type="hidden" value="{{ old('file',$repo->file) }}" name="oldFile">           
        </div>
    </div>
    
    <a href="/admin/repo" class="btn btn-danger  float-end">Batal</a>      
    <button type="submit" class="btn btn-primary float-end me-3">Simpan</button>
</form>   
</div>

 <script>
//     const komoditas = document.querySelector('#komoditas');
//     const slug = document.querySelector('#slug');


//     nama.addEventListener('change',function(){
//         fetch('/admin/bisnis/CekSlug?komoditas='+ komoditas.value)
//             .then (response => response.json())
//             .then (data => slug.value = data.slug)
//     });
</script>


@endsection
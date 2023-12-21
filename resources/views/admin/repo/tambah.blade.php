@extends('admin.main')
@section('container')


<div class="container my-3">
    <h3 class="my-3 text-center">Jurnal Baru</h3>
    <form action="/admin/repo" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row mb-3">
        <label for="judul" class="col-sm-2 col-form-label">Judul Jurnal</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="judul" name="judul">
        </div>
    </div>
    <div class="row mb-3">
        <label for="slug" class="col-sm-2 col-form-label">Slug</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="slug" name="slug">
        </div>
    </div>
    <div class="row mb-3">        
        <label for="cover" class="col-sm-2 col-form-label">Cover Jurnal</label>
        <!-- <img class="img-preview img-fluid mb-3 col-sm-5"> -->
        <div class="col-sm-10">
            <input class="form-control" type="file" id="cover" name="cover" onchange="previewImg()">        
        </div>
    </div>
    <div class="row mb-3">        
        <label for="file" class="col-sm-2 col-form-label">File Jurnal</label>
        <!-- <img class="img-preview img-fluid mb-3 col-sm-5"> -->
        <div class="col-sm-10">
            <input class="form-control" type="file" id="file" name="file">
            <p><small>*Jenis file : doc,docx atau pdf (max.10 MB)</small></p>
        </div>
    </div>
          
    <a href="/admin/repo" class="btn btn-danger  float-end">Batal</a>      
    <button type="submit" class="btn btn-primary float-end me-3">Simpan</button>
</form>   
</div>

<!-- <script>-->
<!--    const komoditas = document.querySelector('#komoditas');-->
<!--    const slug = document.querySelector('#slug');-->


<!--    nama.addEventListener('change',function(){-->
<!--        fetch('/admin/bisnis/CekSlug?komoditas='+ komoditas.value)-->
<!--            .then (response => response.json())-->
<!--            .then (data => slug.value = data.slug)-->
<!--    });-->

<!--    function previewImg(){-->
<!--        const gambar = document.querySelector('#gambar');-->
<!--        const preview = document.querySelector('.img-preview');-->

<!--        preview.style.display:'block';-->

<!--        const oFReader = new FileReader();-->
<!--        oFReader.readAsDataURL(gambar.file[0]);-->

<!--        oFReader.onload = function (oFREvent){-->
<!--            preview.src = oFREvent.target.result;-->
<!--        }-->
<!--    }-->
    
<!--</script> -->


@endsection
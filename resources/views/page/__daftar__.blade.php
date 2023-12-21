<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>{{$title}}</title>
    <link href="css/sign-in.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  
  </head>
  <body class="d-flex align-items-center py-2 bg-body-tertiary">

    
      

      
      <main class="form-signin text-center w-50 m-auto">
        <form action="/daftar" method="post">

          @csrf

          <div>
            <img class="mb-4 w-100 h-100" src="img/logo_hijau.png">
            <h1 class="h3 mb-3 fw-normal">Daftar User Baru</h1>
          </div>
          
          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="name" placeholder="name" name="name">
            <label for="name">Nama</label>
          </div>          
          <div class="form-floating mb-2">
            <input type="email" class="form-control" id="email" placeholder="email@example.com" name="email">
            <label for="email">Email</label>
          </div>
          <div class="form-floating mb-2">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            <label for="password">Password</label>
          </div>
          <select class="form-select form-select-lg mb-4" name="role">
            <option selected><small>Pilih Role</small></option>
            <option value="1">Admin</option>
            <option value="2">Pembeli</option>
          </select>

          <button class="btn btn-primary w-100 py-2 mb-2" type="submit">Simpan</button>
          
          <p>Belum Punya Akun? Silakan <a href="/login">Login</a></p>
          
          <p class="mt-5 mb-3 text-body-secondary text-center">Javawangi Indonesia&copy;2023</p>
        </form>
      </main>

  

 
  

<script src="js/script.js"></script>

    </body>
</html>

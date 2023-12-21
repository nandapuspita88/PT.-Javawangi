@extends('app')
 
@section('content')
<main class="form-signin text-center w-25 m-auto">
        <form action="{{ route('register.custom') }}" method="post">

          @csrf

          <div>
            <img class="mb-4 w-100 h-100" src="img/logo_hijau.png">
            <h1 class="h3 mb-3 fw-normal">Daftar User Baru</h1>
          </div>
          
          <div class="form-group mb-2">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama" name="name">
            @error ('name')
            <div class="invalid-feedback">Name Invalid</div>
            @enderror
          </div>          
          <div class="form-group mb-2">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email">
            @error ('email')
            <div class="invalid-feedback">Email Invalid</div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
            @error ('password')
            <div class="invalid-feedback">Password Invalid</div>
            @enderror
          </div>
          <input type="hidden" name="role" value="2">
          <button class="btn btn-primary w-100 py-2 mb-2" type="submit">Simpan</button>
          
          <p>Sudah Punya Akun? Silakan <a href="/login">Login</a></p>
          
          <p class="mt-5 mb-3 text-body-secondary text-center">Javawangi Indonesia&copy;2023</p>
        </form>
      </main>
@endsection 
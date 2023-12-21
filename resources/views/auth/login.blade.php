@extends('app')

@section('content')
<main class="login-form mt-5">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <img class="m-auto py-2 w-75 h-75" src="img/logo_hijau.png">
                    <h3 class="card-header text-center">Login</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="d-grid mx-auto text-center">
                                <button type="submit" class="btn btn-success btn-block mb-2">Login</button>
                                <a class="btn btn-danger btn-block mb-3" href="/">Kembali ke Beranda<a>
                                <p>Belum Punya Akun? Silakan <a href="/registration">Daftar</a></p>
                                <p class="mt-5 mb-3 text-body-secondary text-center">Javawangi Indonesia&copy;2023</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection 
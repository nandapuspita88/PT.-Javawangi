<nav class="shadow-lg navbar navbar-expand-lg bg-transparent mb-3">
      <div class="container">
        <a class="navbar-brand mx-1" href="/">
            <img src="{{ asset('img/logo_hijau.png') }}" alt="Javawangi" width="200" height="80">
        </a>    
        
          <ul class="navbar-nav nav-underline mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link {{ ($title === 'Home' ) ? 'active' : '' }}" href="/">Home</a>
            </li>            
            <li class="nav-item">
              <a class="nav-link {{($title==='Tentang Kami')?'active':''}}" href="/about">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{($title==='Bisnis')?'active':''}}" href="/bisnis">Bisnis</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{($title==='Layanan')?'active':''}}" href="/layanan">Layanan</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle {{($title==='Media & Edukasi')?'active':''}}" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false" >Media & Edukasi</a>
              <ul class="dropdown-menu shadow">
                <li><a class="dropdown-item" href="/news">News</a></li>
                <li>
                  <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Pengetahuan & Inspirasi</a>
                  <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                      <a class="dropdown-item" href="/javapedia">Javapedia</a>  
                      <a class="dropdown-item" href="/solusi">Solusi Masalah</a>            
                      <a class="dropdown-item" href="/inspirasi">Inspirasi</a>                      
                    </div>
                  </div>
                </li>
                <li><a class="dropdown-item" href="/repository">Repository</a></li>
                <li><a class="dropdown-item" href="/bahan">Bahan Alam</a></li>
                
              </ul>
            </li>   
            <li class="nav-item">
              <a class="nav-link {{ ($title === 'Kontak' ) ? 'active' : '' }}" href="/kontak">Kontak</a>
            </li>                    
                    
            <div class="d-grid d-md-flex justify-content-md-end">
               @auth  
                <a href="{{ route('cart.list') }}" class="btn btn-outline-success position-relative me-2">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                      {{ Cart::getTotalQuantity()}}                  
                    </span>
                </a>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Welcome,
                    {{ strtoupper(Auth::user()->name) }}
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="signout">Log Out</a></li>
                  </ul>
                </li>

             

                @else  
                <li class="nav-item">
                  <a class="btn btn-success me-md-2 btn-sm" type="button" href="/login">Log In</a>
                  <a class="btn btn-outline-success btn-sm" type="button" href="/registration">Daftar</a>
                </li>
                @endauth 
            </div>
            </ul>
      </div>
    </nav>
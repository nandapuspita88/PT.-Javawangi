<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name','LSAPP') }} | {{ $title }}</title>
    <link href="{{ asset('/css/fa/css/font-awesome.min.css') }}" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">    
    <link rel="stylesheet" href="/css/admin_custom.css">
    
    <!-- <link rel="stylesheet" href="/css/cardslider.css">  -->   
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" href="/css/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" href="/css/slick/slick-theme.css"/>
  </head>
  <body>

    @include('partial.navbar')

    <div class="container">
      @yield('container')      
    </div>

    <footer class="p-2">
    <div class="container-fluid bg-success ">
      <div class="row text-center">
        <div class="col-md-6 themed-grid-col text-light py-3">
            <img src="{{ asset('img/logo_emas.png') }} " class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">PT. JAVAWANGI INDONESIA</h5>
              <p class="card-text">Jln. KH.Wahid Hasyim No.46, Penganjuran,<br> Kec.Banyuwangi, Kab.Banyuwangi, Jawa Timur 68416</p>            
            </div>
        </div>

        <div class="col-md-6 themed-grid-col">        
          <div class="row">
            <div class="col-md-4 themed-grid-col text-light pt-5">
              <h5>COMPANY</h5>
                <div class="p-2"><a href="/" class="text-light mb-3 link-offset-2 link-underline link-underline-opacity-0">HOME</a></div>
                <div class="p-2"><a href="/about" class="text-light mb-3 link-offset-2 link-underline link-underline-opacity-0">TENTANG KAMI</a></div>
                <div class="p-2"><a href="/bisnis" class="text-light mb-3 link-offset-2 link-underline link-underline-opacity-0">BISNIS</a></div>
                <div class="p-2"><a href="/layanan" class="text-light mb-3 link-offset-2 link-underline link-underline-opacity-0">LAYANAN</a></div>
                <div class="p-2"><a href="" class="text-light mb-3 link-offset-2 link-underline link-underline-opacity-0">KONSULTASI</a></div>
                <div class="p-2"><a href="/kontak" class="text-light mb-3 link-offset-2 link-underline link-underline-opacity-0">KONTAK</a></div>
            </div>

            <div class="col-md-4 themed-grid-col text-light pt-5">
              <h5>JOIN US</h5>
                <div class="p-2"><a href="#" class="text-light mb-3 link-offset-2 link-underline link-underline-opacity-0">PEMBELI</a></div>
                <div class="p-2"><a href="#" class="text-light mb-3 link-offset-2 link-underline link-underline-opacity-0">PETANI</a></div>
                <div class="p-2"><a href="#" class="text-light mb-3 link-offset-2 link-underline link-underline-opacity-0">AGEN</a></div>             
            </div>

            <div class="col-md-4 themed-grid-col text-light pt-5">
              <H5>SOCIAL MEDIA</H5>
              <div class="d-flex justify-content-between mt-4 px-3">
                <div><a href="#" class="text-light mb-3 link-offset-2 link-underline link-underline-opacity-0"><i class="fa fa-2x fa-facebook me-2" aria-hidden="true"></i></a></div>
                <div><a href="#" class="text-light mb-3 link-offset-2 link-underline link-underline-opacity-0"><i class="fa fa-2x fa-youtube-play me-2" aria-hidden="true"></i></a></div>
                <div><a href="#" class="text-light mb-3 link-offset-2 link-underline link-underline-opacity-0"><i class="fa fa-2x fa-instagram me-2" aria-hidden="true"></i></a></div>            
              </div>
            </div>
          </div>
        </div>      
      </div>
    </div>    
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="{{ asset('/css/slick/slick.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/carousel.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    
    
    


    
    
  </body>
</html>
@extends('layout.main')
  
@section('container')

<div class="container mt-5">
    <h3 class="fst-italic fw-bold">Contact Us</h3>
    <p>Silakan kunjungi kantor <strong class="text-success">Javawangi</strong> yang terdekat dengan Anda atau hubungi Kami via telepon maupun sosial media untuk informasi lebih lanjut mengenai <strong class="text-success">Javawangi</strong>.</p>
</div>

<div class="mapouter border border-2">
    <div class="gmap_canvas">
        <iframe src="https://maps.google.com/maps?q=jl%20KH%20wahid%20hasyim%20no.46%20penganjuran%20banyuwangi%20jawa%20timur&amp;t=&amp;z=20&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" style="width: 1080px; height: 1080px;">
        </iframe>
        <style>
        .mapouter{position:relative;height:1080px;width:1080px;background:#fff;} 
        .maprouter a{color:#fff !important;position:absolute !important;top:0 !important;z-index:0 !important;}
        </style>
       
        <style>
            .gmap_canvas{overflow:hidden;height:1080px;width:1080px}.gmap_canvas iframe{position:relative;z-index:2}
        </style>
    </div>
</div>

<div class="container my-5">
    <div class="row text-center">
            <h3 class="fw-bold"><strong class="text-success">Javawangi</strong> Head Office</h3>
            <h5>Jln. KH. Wahid Hasyim No.46 Penganjuran, Kec.Banyuwangi, Kab.Banyuwangi, Jawa Timur 68416</h5>
            <h5 class="mt-3"><strong>Telp.081234567885</strong></h5>
    </div>
</div>
@endsection

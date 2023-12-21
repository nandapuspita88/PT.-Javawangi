@extends('adminlte::page')

@section('title', 'Javawangi | Dashboard')

@section('content_header')
    <h1>{{ $title }}</h1>
@stop

@section('content')

    @yield('container')

@stop


@section('css')
	<link href="{{ asset('/css/fa/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">       
    <link rel="stylesheet" href="/css/style.css">
    <link href="{{ asset('/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/css/tempusdominus-bootstrap-4.min.css" crossorigin="anonymous" />

@stop

@section('js')
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>   
    <script src="{{ asset('/js/script.js') }}"></script>
    <script src="{{ asset('/js/moment.min.js') }}"></script>  
    <script src="{{ asset('/js/tempusdominus-bootstrap-4.js') }}"></script>   
@stop
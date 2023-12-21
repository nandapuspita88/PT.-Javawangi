@extends('admin.main')

@section('container')

<div class="container">
	<a href="/admin" class="btn btn-outline-success btn-sm text-decoration-none"><i class="fa fa-reply" aria-hidden="true"></i> Kembali</a>
	<div class="row mt-5">
		<h3 class="text-center fw-bold mb-5">Pendaftar Event {{$event}}</h3>
		@php
		$heads = [
		    ['label' => '#', 'width' => 3],	   
		    ['label' => 'Nama', 'width' => 20],
		    ['label' => 'Instansi', 'width' => 20],  
		    ['label' => 'Alamat', 'width' => 20],
		    ['label' => 'No.Telpon', 'width' => 20],
		    ['label' => 'Tanggal Daftar', 'no-export' => true, 'width' => 20],
		];

		$config = [
		    
		    'order' => [[1, 'asc']],
		    'columns' => [null, null, null, null, null, ['orderable' => false]],
		];
		@endphp

		{{-- Minimal example / fill data using the component slot --}}
		<x-adminlte-datatable id="table1" :heads="$heads" class="display compact table-striped bordered">
		    @foreach($x as $p)
		        <tr>
		          <td class="align-middle">{{ $loop->iteration }}</td>	         
		          <td class="align-middle">{{ $p->nama }}</td>
		          <td class="align-middle">{{ $p->instansi }}</td>
		          <td class="align-middle">{{ $p->alamat }}</td>
		          <td class="align-middle">{{ $p->tlp }}</td>         
		          <td class="align-middle">{{ date('j F Y', strtotime($p->created_at)) }}</td>		          
		        </tr>
		    @endforeach
		</x-adminlte-datatable>
	</div>
</div>

@endsection
@extends('admin.main')

@section('container')


<div class="container">
	<h5 class="row bg-success fst-italic p-3">Selamat Datang Kembali, {{ $user->name }} !</h5>
	<div class="row mb-5 justify-content-center">
		<img src="img/logo_hijau.png" class="h-50 w-50">
	</div>
	<div class="row">
		<div class="col-md-3">
			<x-adminlte-small-box title="{{$agen}}" text="Jumlah Agen" icon="fas fa-truck text-dark" theme="warning" url="admin/agen" url-text="View details"/>
		</div>
		<div class="col-md-3">
			<x-adminlte-small-box title="{{$mitra}}" text="Jumlah Mitra" icon="fas fa-handshake-o text-dark" theme="danger" url="admin/mitra" url-text="View details"/>
		</div>
		<div class="col-md-3">
			<x-adminlte-small-box title="{{$franchise}}" text="Jumlah Franchise" icon="fa fa-cutlery text-dark" theme="info" url="admin/franchise" url-text="View details"/>
		</div>
		<div class="col-md-3">
			<x-adminlte-small-box title="{{$users}}" text="Jumlah User" icon="fa fa-users text-dark" theme="success" url="admin/user" url-text="View details"/>
		</div>
	</div>

	<div class="row mt-5">
		<h2 class="text-center">Daftar Event</h2>
		<div class="col"> 
			@php
			$heads = [
			    ['label' => '#', 'width' => 3],	   
			    ['label' => 'Nama Event', 'width' => 20],   
			    ['label' => 'Tanggal Pelaksanaan', 'width' => 20],
			    ['label' => 'Jumlah Pendaftar', 'width' => 20],
			    ['label' => 'Actions', 'no-export' => true, 'width' => 20],
			];

			$config = [
			    
			    'order' => [[1, 'asc']],
			    'columns' => [null, null, null, null, null, ['orderable' => false]],
			];
			@endphp

			{{-- Minimal example / fill data using the component slot --}}
			<x-adminlte-datatable id="table1" :heads="$heads" class="display compact table-striped bordered">
			    @foreach($event as $p)
			        <tr>
			          <td class="align-middle">{{ $loop->iteration }}</td>	         
			          <td class="align-middle">{{ $p->nama_event }}</td>         
			          <td class="align-middle">{{ date('j F Y', strtotime($p->tgl)) }}</td>
			          <td class="align-middle">{{ $p->pendaftar->count() }}</td>
			          <td class="align-middle">
			            <a href="/event/{{$p->id}}/list" class="btn btn-sm btn-info">Cek Pendaftar</a>
			          </td>
			        </tr>
			    @endforeach
			</x-adminlte-datatable>	
		</div>
	</div>
	
</div>





@endsection
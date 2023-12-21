@extends('admin.main')

@section('container')

@if(session()->has('sukses'))
<x-adminlte-alert theme="success" title="Success" dismissable>
    {{ session('sukses') }}
</x-adminlte-alert>
@endif

<a href="mitra/create" class="btn btn-success mb-2 mt-2 float-end"><i class="fa fa-plus" aria-hidden="true"></i> Mitra Baru</a>


@php
$heads = [
    ['label' => '#', 'width' => 3],
    ['label' => 'Foto', 'width' => 15],
    ['label' => 'Nama Mitra', 'width' => 15],
    ['label' => 'Email', 'width' => 15],
    ['label' => 'Jenis Mitra', 'width' => 15],
    ['label' => 'No.Telp', 'width' => 15],
    ['label' => 'Alamat', 'width' => 40],
    ['label' => 'Actions', 'no-export' => true, 'width' => 15],
];

$config = [
    
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table1" :heads="$heads" class="display compact table-striped">
    @foreach($mitra as $p)
        <tr>
          <td class="align-middle">{{$loop->iteration}}</td>
          <td class="text-center"><img src="{{ asset('storage/' . $p->foto) }}" class=" img-fluid img-thumbnail"></td>
          <td class="align-middle">{{ $p->nama_mitra }}</td>
          <td class="align-middle">{{ $p->email }}</td>
          <td class="align-middle">{{ $p->jenis }}</td>
          <td class="align-middle">{{ $p->telp }}</td>
          <td class="align-middle"><small>{{ $p->alamat }}</small></td>     
          <td class="text-center align-middle">        
            <a href="mitra/{{ $p->id }}/edit" class="btn btn-outline-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
            <form action="mitra/{{ $p-> id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?!')"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </form>
    
          </td>
        </tr>
    @endforeach
</x-adminlte-datatable>

@endsection


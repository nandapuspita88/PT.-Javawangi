@extends('admin.main')

@section('container')

@if(session()->has('sukses'))
<x-adminlte-alert theme="success" title="Success" dismissable>
    {{ session('sukses') }}
</x-adminlte-alert>
@endif

<a href="franchise/create" class="btn btn-success mb-2 mt-2 float-end"><i class="fa fa-plus" aria-hidden="true"></i> Franchise Baru</a>
@php
$heads = [
    ['label' => '#', 'width' => 3],
    ['label' => 'Foto', 'width' => 10],
    ['label' => 'Nama Franchise', 'width' => 20],
    ['label' => 'Alamat', 'width' => 30],
    ['label' => 'Jam Buka', 'width' => 15],
    ['label' => 'Actions', 'no-export' => true, 'width' => 15],
];

$config = [
    
    'order' => [[1, 'asc']],
    'columns' => [null, null, null,null,null, ['orderable' => false]],
];
@endphp


<x-adminlte-datatable id="table1" :heads="$heads" class="display compact table-striped">
    @foreach($franchise as $p)
        <tr>
          <td class="align-middle">{{ $p->id }}</td>
          <td class="align-middle"><img src="{{ asset('storage/'. $p->gambar) }}" class="img-fluid img-thumbnail"></td>
          <td class="align-middle">{{ $p->nama_franchise }}</td>
          <td><small>{!! $p->alamat !!}</small></td>
          <td class="align-middle">{{ $p->jam_buka }}</td>
          <td class="align-middle">
            <a href="franchise/{{ $p->id }}/edit" class="btn btn-outline-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
            <form action="franchise/{{ $p-> id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?!')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
            </form>
          </td>
        </tr>
    @endforeach
</x-adminlte-datatable>



@endsection


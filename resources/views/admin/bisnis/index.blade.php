@extends('admin.main')

@section('container')

@if(session()->has('sukses'))
<x-adminlte-alert theme="success" title="Success" dismissable>
    {{ session('sukses') }}
</x-adminlte-alert>
@endif

<a href="bisnis/create" class="btn btn-success mb-2 mt-2 float-end"><i class="fa fa-plus" aria-hidden="true"></i> Produk Baru</a>

@php
$heads = [
    ['label' => '#', 'width' => 3],
    ['label' => 'Foto', 'width' => 10],
    ['label' => 'Nama Produk', 'width' => 20],
    ['label' => 'Harga', 'width' => 10],
    ['label' => 'Deskripsi', 'width' => 40],
    ['label' => 'Actions', 'no-export' => true, 'width' => 15],
];

$config = [
    
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table1" :heads="$heads" class="display compact table-striped">
    @foreach($produk as $p)
        <tr>
          <td class="align-middle">{{ $loop->iteration }}</td>
          <td class="align-middle"><img src="{{ asset('storage/'. $p->gambar) }}" class="img-fluid img-thumbnail"></td>
          <td class="align-middle">{{ $p->nama_produk }}</td>
          <td class="align-middle">Rp. {{ $p->harga }}</td>
          <td><small>{!! $p->deskripsi !!}</small></td>
          <td class="align-middle">
            <a href="bisnis/{{ $p->slug }}/edit" class="btn btn-outline-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
            <form action="bisnis/{{ $p-> slug }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?!')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
            </form>
          </td>
        </tr>
    @endforeach
</x-adminlte-datatable>



@endsection


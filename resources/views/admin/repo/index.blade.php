@extends('admin.main')

@section('container')

@if(session()->has('sukses'))
<x-adminlte-alert theme="success" title="Success" dismissable>
    {{ session('sukses') }}
</x-adminlte-alert>
@endif

<a href="repo/create" class="btn btn-success mb-2 mt-2 float-end"><i class="fa fa-plus" aria-hidden="true"></i> Jurnal Baru</a>

@php
$heads = [
    ['label' => '#', 'width' => 3],
    ['label' => 'Cover', 'width' => 10],
    ['label' => 'Judul Jurnal', 'width' => 55],
    ['label' => 'Download', 'width' => 15],
    ['label' => 'Actions', 'no-export' => true, 'width' => 20],
];

$config = [
    
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table1" :heads="$heads" class="display compact table-striped">
    @foreach($repo as $p)
        <tr>
          <td class="align-middle">{{ $loop->iteration }}</td>
          <td class="align-middle"><img src="{{ asset('storage/'. $p->cover) }}" class="img-fluid img-thumbnail"></td>
          <td class="align-middle">{{ $p->judul }}</td>
          <td class="align-middle">
              <button class="btn btn-sm btn-primary">Download</button>
          </td>
          <td class="align-middle">
            <a href="repo/{{ $p->slug }}/edit" class="btn btn-outline-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
            <form action="repo/{{ $p->slug }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?!')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
            </form>
          </td>
        </tr>
    @endforeach
</x-adminlte-datatable>



@endsection


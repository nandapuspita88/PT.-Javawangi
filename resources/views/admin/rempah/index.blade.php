@extends('admin.main')

@section('container')

@if(session()->has('sukses'))
<x-adminlte-alert theme="success" title="Success" dismissable>
    {{ session('sukses') }}
</x-adminlte-alert>
@endif

<a href="rempah/create" class="btn btn-success mb-2 mt-2 float-end"><i class="fa fa-plus" aria-hidden="true"></i> Potensi</a>
@php
$heads = [
    ['label' => '#', 'width' => 5],
    ['label' => 'Data Rempah', 'width' => 25],
    ['label' => 'Rempah Terbaik', 'width' => 25],
    ['label' => 'Potensi Ekspor', 'width' => 25],
    ['label' => 'Actions', 'no-export' => true, 'width' => 20],
];

$config = [    
    'order' => [[1, 'asc']],
    'columns' => [null, null, ['orderable' => false]],
];
@endphp


<x-adminlte-datatable id="table1" :heads="$heads" class="display compact table-striped">
    @foreach($bahan as $p)
        <tr class="text-center">
          <td class="align-middle">{{ $loop->iteration }}</td>
          <td class="align-middle"><img src="{{ asset('storage/'. $p->data) }}" class="img-fluid img-thumbnail h-25 w-25"></td>
          <td class="align-middle"><img src="{{ asset('storage/'. $p->potensi) }}" class="img-fluid img-thumbnail h-25 w-25"></td>
          <td class="align-middle"><img src="{{ asset('storage/'. $p->ekspor) }}" class="img-fluid img-thumbnail h-25 w-25"></td>
          <td class="align-middle">
            <a href="rempah/{{ $p->id }}/edit" class="btn btn-outline-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
            <form action="rempah/{{ $p-> id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?!')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
            </form>
          </td>
        </tr>
    @endforeach
</x-adminlte-datatable>



@endsection


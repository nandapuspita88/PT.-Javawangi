@extends('admin.main')

@section('container')

@if(session()->has('sukses'))
<x-adminlte-alert theme="success" title="Success" dismissable>
    {{ session('sukses') }}
</x-adminlte-alert>
@endif

<a href="event/create" class="btn btn-success mb-2 mt-2 float-end"><i class="fa fa-plus" aria-hidden="true"></i> Event Baru</a>
@php
$heads = [
    ['label' => '#', 'width' => 3],
    ['label' => 'Gambar', 'width' => 20],
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
<x-adminlte-datatable id="table1" :heads="$heads" class="display compact table-striped">
    @foreach($event as $p)
        <tr>
          <td class="align-middle">{{ $loop->iteration }}</td>
          <td class="align-middle"><img src="{{ asset('storage/'. $p->gambar) }}" class="img-fluid img-thumbnail"></td>
          <td class="align-middle">{{ $p->nama_event }}</td>         
          <td class="align-middle">{{ date('j F Y', strtotime($p->tgl)) }}</td>
          <td class="align-middle">{{ $p->pendaftar->count() }}</td>
          <td class="align-middle">
            <a href="event/{{ $p->id }}/edit" class="btn btn-outline-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
            <form action="event/{{ $p-> id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?!')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
            </form>
          </td>
        </tr>
    @endforeach
</x-adminlte-datatable>



@endsection


@extends('admin.main')

@section('container')

@if(session()->has('sukses'))
<x-adminlte-alert theme="success" title="Success" dismissable>
    {{ session('sukses') }}
</x-adminlte-alert>
@endif

<a href="user/create" class="btn btn-success mb-2 mt-2 float-end"><i class="fa fa-plus" aria-hidden="true"></i> User Baru</a>


@php
$heads = [
    ['label' => '#', 'width' => 3],
   
    ['label' => 'Nama User', 'width' => 30],
    ['label' => 'Email', 'width' => 30],
    ['label' => 'Role', 'width' => 15],
    ['label' => 'Actions', 'no-export' => true, 'width' => 15],
];

$config = [
    
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table1" :heads="$heads" class="display compact table-striped">
    @foreach($user as $p)
        <tr>
          <td class="align-middle">{{$loop->iteration}}</td>
          
          <td class="align-middle">{{ $p->name }}</td>
          <td class="align-middle">{{ $p->email }}</td>
          <td class="align-middle">{{ $p->role }}</td>
          
              
          <td class="text-center align-middle">        
            <a href="user/{{ $p->id }}/edit" class="btn btn-outline-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
            <form action="user/{{ $p-> id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?!')"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </form>
    
          </td>
        </tr>
    @endforeach
</x-adminlte-datatable>

@endsection


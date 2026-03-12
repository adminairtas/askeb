@extends('admin.layout.app')

@section('content')

<h1 class="text-xl font-bold mb-4">Data Mahasiswa</h1>

<table class="w-full border">

<thead>
<tr>
<th class="border p-2">Nama</th>
<th class="border p-2">Email</th>
</tr>
</thead>

<tbody>

@foreach($mahasiswa as $mhs)

<tr>
<td class="border p-2">{{ $mhs->name }}</td>
<td class="border p-2">{{ $mhs->email }}</td>
</tr>

@endforeach

</tbody>

</table>

@endsection
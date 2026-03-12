@extends('admin.layout.app')

@section('content')

<h1 class="text-xl font-bold mb-4">Data Dosen</h1>

<table class="w-full border">

<thead>
<tr>
<th class="border p-2">Nama</th>
<th class="border p-2">Email</th>
</tr>
</thead>

<tbody>

@foreach($dosen as $dsn)

<tr>
<td class="border p-2">{{ $dsn->name }}</td>
<td class="border p-2">{{ $dsn->email }}</td>
</tr>

@endforeach

</tbody>

</table>

@endsection
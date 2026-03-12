@extends('admin.layout.app')

@section('content')

<h1 class="text-xl font-bold mb-4">Data ASKEB Mahasiswa</h1>

<table class="w-full border">

<thead>
<tr>
<th class="border p-2">Mahasiswa</th>
<th class="border p-2">Tanggal</th>
<th class="border p-2">Status</th>
</tr>
</thead>

<tbody>

@foreach($askeb as $a)

<tr>
<td class="border p-2">{{ $a->user->name ?? '-' }}</td>
<td class="border p-2">{{ $a->created_at->format('d-m-Y') }}</td>
<td class="border p-2">{{ $a->status }}</td>
</tr>

@endforeach

</tbody>

</table>

@endsection
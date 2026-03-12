@extends('admin.layout.app')

@section('content')

<h1 class="text-xl font-bold mb-4">Tambah User</h1>

<form action="{{ route('admin.users.store') }}" method="POST">

@csrf

<div class="mb-3">
<label>Nama</label>
<input type="text" name="name" class="border w-full p-2">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="border w-full p-2">
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="border w-full p-2">
</div>

<div class="mb-3">
<label>Role</label>
<select name="role" class="border w-full p-2">
<option value="mahasiswa">Mahasiswa</option>
<option value="dosen">Dosen</option>
</select>
</div>

<button class="bg-green-600 text-white px-4 py-2 rounded">
Simpan
</button>

</form>

@endsection
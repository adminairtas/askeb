@extends('adminlte::page')

@section('title', 'Dashboard Mahasiswa')

@section('content_header')
    <h1>Dashboard Mahasiswa</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        Selamat datang, {{ auth()->user()->name }}
    </div>
</div>
@stop
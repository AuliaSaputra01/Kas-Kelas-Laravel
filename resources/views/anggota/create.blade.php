@extends('layouts.app')
@section('title', 'Tambah Anggota')
@section('content')
<h3 class="mb-3">Tambah Anggota</h3>
<div class="card"><div class="card-body">
    <form action="{{ route('anggota.store') }}" method="POST">@include('anggota._form')</form>
</div></div>
@endsection

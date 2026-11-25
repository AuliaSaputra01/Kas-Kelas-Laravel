@extends('layouts.app')
@section('title', 'Edit Anggota')
@section('content')
<h3 class="mb-3">Edit Anggota</h3>
<div class="card"><div class="card-body">
    <form action="{{ route('anggota.update', $anggota) }}" method="POST">@method('PUT') @include('anggota._form')</form>
</div></div>
@endsection

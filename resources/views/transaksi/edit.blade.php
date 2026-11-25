@extends('layouts.app')
@section('title', 'Edit Transaksi')
@section('content')
<h3 class="mb-3">Edit Transaksi</h3>
<div class="card"><div class="card-body">
    <form action="{{ route('transaksi.update', $transaksi) }}" method="POST">@method('PUT') @include('transaksi._form')</form>
</div></div>
@endsection

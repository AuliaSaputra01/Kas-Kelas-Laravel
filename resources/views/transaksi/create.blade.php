@extends('layouts.app')
@section('title', 'Catat Transaksi')
@section('content')
<h3 class="mb-3">Catat Transaksi</h3>
<div class="card"><div class="card-body">
    <form action="{{ route('transaksi.store') }}" method="POST">@include('transaksi._form')</form>
</div></div>
@endsection

@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<h3 class="mb-4">Dashboard</h3>
<div class="row g-3 mb-4">
    <div class="col-md-3"><div class="card text-bg-success"><div class="card-body">
        <div>Total Pemasukan</div><h4>Rp {{ number_format($totalMasuk, 0, ',', '.') }}</h4></div></div></div>
    <div class="col-md-3"><div class="card text-bg-danger"><div class="card-body">
        <div>Total Pengeluaran</div><h4>Rp {{ number_format($totalKeluar, 0, ',', '.') }}</h4></div></div></div>
    <div class="col-md-3"><div class="card text-bg-primary"><div class="card-body">
        <div>Saldo Kas</div><h4>Rp {{ number_format($saldo, 0, ',', '.') }}</h4></div></div></div>
    <div class="col-md-3"><div class="card text-bg-secondary"><div class="card-body">
        <div>Jumlah Anggota</div><h4>{{ $jumlahAnggota }}</h4></div></div></div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <strong>5 Transaksi Terbaru</strong>
        <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-primary">+ Catat Transaksi</a>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead><tr><th>Tanggal</th><th>Anggota</th><th>Jenis</th><th>Jumlah</th><th>Keterangan</th></tr></thead>
            <tbody>
            @forelse ($terbaru as $t)
                <tr>
                    <td>{{ $t->tanggal->format('d/m/Y') }}</td>
                    <td>{{ $t->anggota->nama ?? '-' }}</td>
                    <td><span class="badge text-bg-{{ $t->jenis == 'masuk' ? 'success' : 'danger' }}">{{ ucfirst($t->jenis) }}</span></td>
                    <td>Rp {{ number_format($t->jumlah, 0, ',', '.') }}</td>
                    <td>{{ $t->keterangan }}</td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-muted">Belum ada transaksi.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

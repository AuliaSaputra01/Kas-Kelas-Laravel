@extends('layouts.app')
@section('title', 'Transaksi Kas')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Transaksi Kas</h3>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">+ Catat Transaksi</a>
</div>
<form class="row g-2 mb-3" method="GET">
    <div class="col-md-3">
        <select name="jenis" class="form-select">
            <option value="">Semua jenis</option>
            <option value="masuk" @selected(request('jenis') == 'masuk')>Pemasukan</option>
            <option value="keluar" @selected(request('jenis') == 'keluar')>Pengeluaran</option>
        </select>
    </div>
    <div class="col-md-4"><input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari keterangan"></div>
    <div class="col-auto"><button class="btn btn-outline-secondary">Filter</button></div>
</form>
<div class="card"><div class="table-responsive">
    <table class="table table-hover mb-0">
        <thead><tr><th>Tanggal</th><th>Anggota</th><th>Jenis</th><th>Jumlah</th><th>Keterangan</th><th class="text-end">Aksi</th></tr></thead>
        <tbody>
        @forelse ($transaksis as $t)
            <tr>
                <td>{{ $t->tanggal->format('d/m/Y') }}</td>
                <td>{{ $t->anggota->nama ?? '-' }}</td>
                <td><span class="badge text-bg-{{ $t->jenis == 'masuk' ? 'success' : 'danger' }}">{{ ucfirst($t->jenis) }}</span></td>
                <td>Rp {{ number_format($t->jumlah, 0, ',', '.') }}</td>
                <td>{{ $t->keterangan }}</td>
                <td class="text-end">
                    <a href="{{ route('transaksi.edit', $t) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('transaksi.destroy', $t) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Hapus transaksi ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center text-muted">Belum ada transaksi.</td></tr>
        @endforelse
        </tbody>
    </table>
</div></div>
<div class="mt-3">{{ $transaksis->links() }}</div>
@endsection

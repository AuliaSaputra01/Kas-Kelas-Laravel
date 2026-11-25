@extends('layouts.app')
@section('title', 'Anggota')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Data Anggota</h3>
    <a href="{{ route('anggota.create') }}" class="btn btn-primary">+ Tambah Anggota</a>
</div>
<form class="row g-2 mb-3" method="GET">
    <div class="col-md-4"><input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari nama / NPM"></div>
    <div class="col-auto"><button class="btn btn-outline-secondary">Cari</button></div>
</form>
<div class="card"><div class="table-responsive">
    <table class="table table-hover mb-0">
        <thead><tr><th>#</th><th>NPM</th><th>Nama</th><th>No. HP</th><th class="text-end">Aksi</th></tr></thead>
        <tbody>
        @forelse ($anggotas as $a)
            <tr>
                <td>{{ $anggotas->firstItem() + $loop->index }}</td>
                <td>{{ $a->npm }}</td><td>{{ $a->nama }}</td><td>{{ $a->no_hp ?? '-' }}</td>
                <td class="text-end">
                    <a href="{{ route('anggota.edit', $a) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('anggota.destroy', $a) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Hapus anggota ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center text-muted">Data tidak ditemukan.</td></tr>
        @endforelse
        </tbody>
    </table>
</div></div>
<div class="mt-3">{{ $anggotas->links() }}</div>
@endsection

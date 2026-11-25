<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // READ (daftar + filter jenis + pencarian keterangan)
    public function index(Request $request)
    {
        $transaksis = Transaksi::with('anggota')
            ->when($request->jenis, fn ($q, $j) => $q->where('jenis', $j))
            ->when($request->q, fn ($q, $kw) => $q->where('keterangan', 'like', "%$kw%"))
            ->latest('tanggal')->latest('id')
            ->paginate(10)
            ->withQueryString();

        return view('transaksi.index', compact('transaksis'));
    }

    // CREATE (form)
    public function create()
    {
        return view('transaksi.create', [
            'transaksi' => new Transaksi(['tanggal' => now()]),
            'anggotas'  => Anggota::orderBy('nama')->get(),
        ]);
    }

    // CREATE (simpan)
    public function store(Request $request)
    {
        Transaksi::create($this->validated($request));

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dicatat.');
    }

    // UPDATE (form)
    public function edit(Transaksi $transaksi)
    {
        return view('transaksi.edit', [
            'transaksi' => $transaksi,
            'anggotas'  => Anggota::orderBy('nama')->get(),
        ]);
    }

    // UPDATE (simpan)
    public function update(Request $request, Transaksi $transaksi)
    {
        $transaksi->update($this->validated($request));

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    // DELETE
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'anggota_id' => 'nullable|exists:anggotas,id',
            'jenis'      => 'required|in:masuk,keluar',
            'jumlah'     => 'required|integer|min:1',
            'tanggal'    => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);
    }
}

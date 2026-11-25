<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    // READ (daftar + pencarian)
    public function index(Request $request)
    {
        $anggotas = Anggota::query()
            ->when($request->q, fn ($q, $kw) => $q->where(fn ($w) => $w->where('nama', 'like', "%$kw%")->orWhere('npm', 'like', "%$kw%")))
            ->orderBy('nama')
            ->paginate(10)
            ->withQueryString();

        return view('anggota.index', compact('anggotas'));
    }

    // CREATE (form)
    public function create()
    {
        return view('anggota.create', ['anggota' => new Anggota()]);
    }

    // CREATE (simpan)
    public function store(Request $request)
    {
        Anggota::create($this->validated($request));

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    // UPDATE (form)
    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    // UPDATE (simpan)
    public function update(Request $request, Anggota $anggota)
    {
        $anggota->update($this->validated($request, $anggota->id));

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diperbarui.');
    }

    // DELETE
    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }

    private function validated(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'npm'   => 'required|string|max:20|unique:anggotas,npm,' . $id,
            'nama'  => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMasuk  = Transaksi::where('jenis', 'masuk')->sum('jumlah');
        $totalKeluar = Transaksi::where('jenis', 'keluar')->sum('jumlah');

        return view('dashboard', [
            'totalMasuk'    => $totalMasuk,
            'totalKeluar'   => $totalKeluar,
            'saldo'         => $totalMasuk - $totalKeluar,
            'jumlahAnggota' => Anggota::count(),
            'terbaru'       => Transaksi::with('anggota')->latest('tanggal')->latest('id')->take(5)->get(),
        ]);
    }
}

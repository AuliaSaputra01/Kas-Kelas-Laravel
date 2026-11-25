<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['24105111136', 'Aulia'],
            ['24105111014', 'Reandra Akbar Pratama'],
            ['24105111142', 'Zulfirman'],
            ['24105111028', 'Aidil'],
            ['24105111166', 'Daniel'],
        ];

        foreach ($data as [$npm, $nama]) {
            $a = Anggota::create(['npm' => $npm, 'nama' => $nama]);
            Transaksi::create([
                'anggota_id' => $a->id,
                'jenis'      => 'masuk',
                'jumlah'     => 10000,
                'tanggal'    => now()->subDays(7),
                'keterangan' => 'Kas minggu ke-1',
            ]);
        }

        Transaksi::create([
            'jenis'      => 'keluar',
            'jumlah'     => 15000,
            'tanggal'    => now()->subDays(3),
            'keterangan' => 'Beli spidol & penghapus',
        ]);
    }
}

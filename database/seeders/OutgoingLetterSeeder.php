<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutgoingLetterSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nomor_surat' => '001/KELUAR/X/2026',
                'tanggal'     => '2026-10-05',
                'tujuan'      => 'Dekan Fakultas Teknik',
                'perihal'     => 'Balasan Undangan Rapat',
                'keterangan'  => 'Konfirmasi kehadiran rapat koordinasi',
            ],
            [
                'nomor_surat' => '002/KELUAR/X/2026',
                'tanggal'     => '2026-10-06',
                'tujuan'      => 'BAA',
                'perihal'     => 'Permohonan Data Mahasiswa',
                'keterangan'  => 'Permohonan data untuk keperluan akreditasi',
            ],
        ];

        foreach ($data as $row) {
            DB::table('outgoing_letters')->updateOrInsert(
                ['nomor_surat' => $row['nomor_surat']],
                $row + ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
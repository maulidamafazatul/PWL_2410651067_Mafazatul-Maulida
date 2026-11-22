<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutgoingLetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('outgoing_letters')->insert([
            [
                'nomor_surat' => '001/FT/X/2026',
                'tanggal' => '2026-10-03',
                'tujuan' => 'Fakultas Teknik',
                'perihal' => 'Undangan Rapat',
                'keterangan' => 'Undangan rapat koordinasi Fakultas Teknik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_surat' => '002/BAA/X/2026',
                'tanggal' => '2026-10-04',
                'tujuan' => 'BAA',
                'perihal' => 'Pemberitahuan Akademik',
                'keterangan' => 'Pemberitahuan kegiatan akademik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_surat' => '083/LPPM/X/2026',
                'tanggal' => '2026-10-05',
                'tujuan' => 'LPPM',
                'perihal' => 'Undangan Sosialisasi',
                'keterangan' => 'Undangan keglatan sosialisasi penelitian',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
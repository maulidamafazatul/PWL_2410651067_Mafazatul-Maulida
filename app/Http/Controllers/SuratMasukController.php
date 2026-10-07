<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index(){
        //return 'Halaman Surat Masuk dari Controller';
        $suratMasuk = [
            [
            'id'            =>1,
            'nomor_surat'   =>'001/FT/X/2026',
            'tanggal'       =>'10-04-2026',
            'pengirim'      =>'Fakultas Teknik',
            'perihal'       =>'Undangan Rapat'
        ],
        [
            'id'            =>2,
            'nomor_surat'   =>'002/BAA/X/2026',
            'tanggal'       =>'10-04-2026',
            'pengirim'      =>'BAA',
            'perihal'       =>'Undangan Akademik'
        ],
        [
            'id'            =>3,
            'nomor_surat'   =>'003/LPPM/X/2026',
            'tanggal'       =>'10-04-2026',
            'pengirim'      =>'LPPM',
            'perihal'       =>'Undangan Sosialisasi'
        ] ];

        return view('surat-masuk.index',compact('suratMasuk'));
    }
    public function show($id){
        return 'Halaman Surat Masuk dari Controller dengan '.$id;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutgoingLetter extends Model
{
    protected $fillable = [
        'nomor_surat',
        'tanggal',
        'tujuan',
        'perihal',
        'keterangan',
        'category_id',
        'lampiran',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
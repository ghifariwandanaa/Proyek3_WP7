<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikan extends Model
{
    use HasFactory;

    protected $table = "riwayat_pendidikan";

    protected $fillable = [
        'halaman_id',
        'thn_mulai',
        'thn_akhir',
        'namaSekolah',
    ];

    public function halaman()
    {
        return $this->belongsTo(Halaman::class, 'halaman_id');
    }
}

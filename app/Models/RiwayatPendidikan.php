<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikan extends Model
{
    use HasFactory;

    protected $table = "riwayat_pendidikan";

    protected $fillable = [
        'profile_id',
        'thn_mulai',
        'thn_akhir',
        'namaSekolah',
    ];

    public function profile()
    {
        return $this->belongsTo(profile::class, 'profile_id');
    }
}

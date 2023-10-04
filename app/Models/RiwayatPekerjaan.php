<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPekerjaan extends Model
{
    use HasFactory;

    protected $table = "riwayat_pekerjaan";

    protected $fillable = [
        'halaman_id',
        'tgl_mulai',
        'tgl_akhir',
        'namaPerusahaan',
        'domisilPerusahaan',
        'jabatan',
    ];

    public function halaman()
    {
        return $this->belongsTo(Halaman::class, 'halaman_id');
    }
}

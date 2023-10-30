<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = "portofolio";

    protected $fillable = [
        'halaman_id',
        'portofolio',
    ];

    public function halaman()
    {
        return $this->belongsTo(Halaman::class, 'halaman_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
    use HasFactory;

    protected $table = "skills";

    protected $fillable = [
        'halaman_id',
        'namaSkill',
        'tingkatanSkill',
    ];


    public function halaman()
    {
        return $this->belongsTo(Halaman::class, 'halaman_id');
    }
    
}

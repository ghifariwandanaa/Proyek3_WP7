<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
    use HasFactory;

    protected $table = "skills";

    protected $fillable = [
        'profile_id',
        'namaSkill',
        'tingkatanSkill',
    ];


    public function profile()
    {
        return $this->belongsTo(profile::class, 'profile_id');
    }
    
}

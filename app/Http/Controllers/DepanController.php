<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profile;
use App\Models\RiwayatPekerjaan;
use App\Models\RiwayatPendidikan;
use App\Models\Skill;

class DepanController extends Controller
{
    public function index()
    {
        $data = profile::orderBy('nama','asc')->get();
        return view ('depan.dataprofil')->with('data',$data);
    }

    public function show($id)
    {
        $profile = profile::find($id);
        $riwayatPekerjaan = RiwayatPekerjaan::where('profile_id', $profile->id)->get();
        $riwayatPendidikan = RiwayatPendidikan::where('profile_id', $profile->id)->get();
        $keahlian = Skill::where('profile_id', $profile->id)->get();

        return view('depan.about', ['data' => ['profile' => $profile, 'riwayatPekerjaan' => $riwayatPekerjaan, 'riwayatPendidikan' => $riwayatPendidikan,'keahlian' => $keahlian ]]);
    }


    
}

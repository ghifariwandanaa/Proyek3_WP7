<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profile;
use App\Models\RiwayatPekerjaan;
use App\Models\RiwayatPendidikan;
use App\Models\Skill;

class ListController extends Controller
{
    public function index()
    {
        $profiles = Profile::orderBy('nama', 'asc')->get();
        $currentId = auth()->id();
        // Mengambil data keahlian (skills) untuk setiap profil
        $data = [];
        foreach ($profiles as $profile) {
            $keahlian = Skill::where('profile_id', $profile->id)->get();
            $riwayatPekerjaan = RiwayatPekerjaan::where('profile_id', $profile->id)->get();
            $riwayatPendidikan = RiwayatPendidikan::where('profile_id', $profile->id)->get();
            $data[] = [
                'profile' => $profile,
                'keahlian' => $keahlian,
                'riwayatPekerjaan' => $riwayatPekerjaan,
                'riwayatPendidikan' => $riwayatPendidikan,
                'currendId' => $currentId
            ];
        }


        return view('listcv', [
            'data' => $data,
        ]);
    }


    public function show($id)
    {
        $profile = profile::find($id);
        $riwayatPekerjaan = RiwayatPekerjaan::where('profile_id', $profile->id)->get();
        $riwayatPendidikan = RiwayatPendidikan::where('profile_id', $profile->id)->get();
        $keahlian = Skill::where('profile_id', $profile->id)->get();
        $currentId = auth()->id();

        return view('depan.about', [
            'data' => [
                'profile' => $profile,
                'riwayatPekerjaan' => $riwayatPekerjaan,
                'riwayatPendidikan' => $riwayatPendidikan,
                'keahlian' => $keahlian,
                'currentId' => $currentId
            ]
        ]);
    }
}

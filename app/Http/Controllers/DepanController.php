<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\halaman;
use App\Models\RiwayatPekerjaan;
use App\Models\RiwayatPendidikan;
use App\Models\Skill;

class DepanController extends Controller
{
    public function index()
    {
        $data = halaman::orderBy('nama','asc')->get();
        return view ('depan.dataprofil')->with('data',$data);
    }

    public function show($id)
    {
        $halaman = halaman::find($id);
        $riwayatPekerjaan = RiwayatPekerjaan::where('halaman_id', $halaman->id)->get();
        $riwayatPendidikan = RiwayatPendidikan::where('halaman_id', $halaman->id)->get();
        $keahlian = Skill::where('halaman_id', $halaman->id)->get();

        return view('depan.about', ['data' => ['halaman' => $halaman, 'riwayatPekerjaan' => $riwayatPekerjaan, 'riwayatPendidikan' => $riwayatPendidikan,'keahlian' => $keahlian ]]);
    }


    
}

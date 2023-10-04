<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\halaman;
use App\Models\RiwayatPekerjaan;

class DepanController extends Controller
{
    public function index()
{
    $data = halaman::orderBy('nama','asc')->get();
    return view ('depan.dataprofil')->with('data',$data);
}

public function show($id)
{
    $data = halaman::find($id);
    return view('depan.about', compact('data'));
}

}

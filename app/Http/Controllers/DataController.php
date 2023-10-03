<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\halaman;

class DataController extends Controller
{
    public function index(Request $request){

        $data = halaman::orderBy('nama','asc')->get();
        return response()->json($data);
    }
}

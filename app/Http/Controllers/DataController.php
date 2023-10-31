<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profile;

class DataController extends Controller
{
    public function index(Request $request){

        $data = profile::orderBy('nama','asc')->get();
        return response()->json($data);
    }
}

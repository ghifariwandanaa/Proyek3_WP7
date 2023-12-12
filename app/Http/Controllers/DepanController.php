<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profile;
use App\Models\RiwayatPekerjaan;
use App\Models\RiwayatPendidikan;
use App\Models\Skill;
use Barryvdh\DomPDF\Facade\Pdf;

class DepanController extends Controller
{
    public function index()
    {
        $profiles = Profile::orderBy('nama', 'asc')->get();
        $currentId = auth()->id();
        $user = auth()->user();

        return view('depan.dataprofil', [
            'data' => $profiles,
            'currentId' => $currentId, // Menambahkan informasi $currentId ke data yang dikirimkan ke view
            'user' => $user
        ]);
    }

    public function show($id)
    {
        $profile = profile::find($id);
        $riwayatPekerjaan = RiwayatPekerjaan::where('profile_id', $profile->id)->get();
        $riwayatPendidikan = RiwayatPendidikan::where('profile_id', $profile->id)->get();
        $keahlian = Skill::where('profile_id', $profile->id)->get();
        $currentId = auth()->id();

        return view('depan.about', ['data' => ['profile' => $profile, 'riwayatPekerjaan' => $riwayatPekerjaan, 'riwayatPendidikan' => $riwayatPendidikan,'keahlian' => $keahlian, 'currentId'=>$currentId ]]);
    }

    public function generatePDF(Request $request, $id)
{
    $profile = Profile::find($id);

    if (!$profile) {
        // Handle the case where the profile with the given ID is not found
        abort(404);
    }

    // Check if the user relationship exists
    if ($profile->user) {
        $userName = $profile->user->name;
    } else {
        $userName = 'unknown'; // Set a default value or handle this case accordingly
    }

    $riwayatPekerjaan = RiwayatPekerjaan::where('profile_id', $profile->id)->get();
    $riwayatPendidikan = RiwayatPendidikan::where('profile_id', $profile->id)->get();
    $keahlian = Skill::where('profile_id', $profile->id)->get();
    $currentId = auth()->id();

    // Initialize the $data array
    $data = [
        'profile' => $profile,
        'riwayatPekerjaan' => $riwayatPekerjaan,
        'riwayatPendidikan' => $riwayatPendidikan,
        'keahlian' => $keahlian,
        'currentId' => $currentId,
        'userName' => $userName, // Pass the user name to the view
    ];

    $pdf = PDF::loadView('depan.atscv', $data);

    // Jika Anda ingin menentukan nama file secara dinamis, misalnya menggunakan nama pengguna
    $fileName = 'profile_' . $userName . '_cv.pdf';

    return $pdf->download($fileName);
}

}

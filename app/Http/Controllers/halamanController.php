<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\Portofolio;
use App\Models\RiwayatPekerjaan;
use App\Models\RiwayatPendidikan;
use App\Models\Skill;
use Illuminate\Http\Request;

class halamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = halaman::orderBy('nama','asc')->get();
        return view ('dashboard.halaman.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.halaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'dataDiri' => 'required',
            'fortofolio.*.' => 'nullable|mimes:pdf',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
            'riwayatPekerjaan.*.tgl_mulai' => 'required',
            'riwayatPekerjaan.*.tgl_akhir' => 'required',
            'riwayatPekerjaan.*.tgl_mulai' => 'required|date',
            'riwayatPekerjaan.*.tgl_akhir' => 'required|date',
            'riwayatPekerjaan.*.namaPerusahaan' => 'required',
            'riwayatPekerjaan.*.domisilPerusahaan' => 'required',
            'riwayatPekerjaan.*.jabatan' => 'required',
        ], [
            'nama.required' => 'Nama Wajib Diisi',
            'alamat.required' => 'Alamat Wajib Diisi',
            'kontak.required' => 'Kontak Wajib Diisi',
            'dataDiri.required' => 'Deskripsi Diri Wajib Diisi',    
            'riwayatPekerjaan.*.tgl_mulai.required' => 'Tanggal Mulai pada Riwayat Pekerjaan Wajib Diisi',
            'riwayatPekerjaan.*.tgl_akhir.required' => 'Tanggal Akhir pada Riwayat Pekerjaan Wajib Diisi',
            'riwayatPekerjaan.*.tgl_mulai'=> 'Tanggal Mulai pada Riwayat Pekerjaan Wajib Diisi dengan format YYYY-MM-DD',
            'riwayatPekerjaan.*.tgl_akhir'=> 'Tanggal Akhir pada Riwayat Pekerjaan Wajib Diisi dengan format YYYY-MM-DD',
            'riwayatPekerjaan.*.namaPerusahaan.required' => 'namaPerusahaan pada Riwayat Pekerjaan Wajib Diisi',
            'riwayatPekerjaan.*.domisilPerusahaan.required' => 'domisilPerusahaan pada Riwayat Pekerjaan Wajib Diisi',
            'riwayatPekerjaan.*.jabatan.required' => 'jabatan  pada Riwayat Pekerjaan Wajib Diisi',
        ]);
    
        // Simpan data dalam tabel 'halaman'
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('gambar');
        }


        $halaman = Halaman::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'dataDiri' => $request->dataDiri,
            'gambar' => $gambarPath,
        ]);

        // dd($request->file('portofolio'));
        foreach ($request->file('portofolio') as $file) {
            $path = $file->store('portofolio');

            Portofolio::create([
                'halaman_id' => $halaman->id,
                'portofolio' => $path,
            ]);
        }
    
        // Simpan data dalam tabel 'riwayat_pekerjaan'
        foreach ($request->riwayatPekerjaan as $pekerjaan) {
            RiwayatPekerjaan::create([
                'halaman_id' => $halaman->id,
                'tgl_mulai' => $pekerjaan['tgl_mulai'],
                'tgl_akhir' => $pekerjaan['tgl_akhir'],
                'namaPerusahaan' => $pekerjaan['namaPerusahaan'],
                'domisilPerusahaan' => $pekerjaan['domisilPerusahaan'],
                'jabatan' => $pekerjaan['jabatan'],
            ]);
        }

        //simpan data riwayat pendidikan
        foreach ($request->riwayatPendidikan as $pendidikan) {
            RiwayatPendidikan::create([
                'halaman_id' => $halaman->id,
                'thn_mulai' => $pendidikan['thn_mulai'],
                'thn_akhir' => $pendidikan['thn_akhir'],
                'namaSekolah' => $pendidikan['namaSekolah'],
            ]);
        }

        // Simpan data dalam tabel 'Skill'
        foreach ($request->hardSkills as $skill) {
            Skill::create([
                'halaman_id' => $halaman->id,
                'namaSkill' => $skill['namaSkill'],
                'tingkatanSkill' => $skill['tingkatanSkill'],
            ]);
        }
    
        return redirect()->route('halaman.index')->with('berhasil','data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $halaman = Halaman::find($id);

        if (!$halaman) {
            return redirect()->route('halaman.index')->with('error', 'Data tidak ditemukan');
        }

        $riwayatPendidikan = RiwayatPendidikan::where('halaman_id', $halaman->id)->get();

        // Ambil semua riwayat pekerjaan yang terkait dengan halaman ini
        $riwayatPekerjaan = RiwayatPekerjaan::where('halaman_id', $halaman->id)->get();
        
        // Ambil data keahlian (skills) yang terkait dengan halaman ini
        $skills = Skill::where('halaman_id', $halaman->id)->get();

        return view('dashboard.halaman.edit', compact('halaman', 'riwayatPekerjaan', 'skills',  'riwayatPendidikan'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'dataDiri' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'riwayatPekerjaan.*.tgl_mulai' => 'required|date',
            'riwayatPekerjaan.*.tgl_akhir' => 'required|date',
            'riwayatPekerjaan.*.namaPerusahaan' => 'required',
            'riwayatPekerjaan.*.domisilPerusahaan' => 'required',
            'riwayatPekerjaan.*.jabatan' => 'required',
            'skills.*.namaSkill' => 'required',
            'skills.*.tingkatanSkill' => 'required|numeric|between:0,100',
        ], [
            'riwayatPekerjaan.*.tgl_mulai.required' => 'Tanggal Mulai pada Riwayat Pekerjaan Wajib Diisi dengan format YYYY-MM-DD',
            'riwayatPekerjaan.*.tgl_akhir.required' => 'Tanggal Akhir pada Riwayat Pekerjaan Wajib Diisi dengan format YYYY-MM-DD',
            'riwayatPekerjaan.*.namaPerusahaan.required' => 'Nama Perusahaan pada Riwayat Pekerjaan Wajib Diisi',
            'riwayatPekerjaan.*.domisilPerusahaan.required' => 'Domisili Perusahaan pada Riwayat Pekerjaan Wajib Diisi',
            'riwayatPekerjaan.*.jabatan.required' => 'Jabatan pada Riwayat Pekerjaan Wajib Diisi',
            'skills.*.namaSkill.required' => 'Nama Keahlian Wajib Diisi',
            'skills.*.tingkatanSkill.required' => 'Tingkatan Keahlian Wajib Diisi',
            'skills.*.tingkatanSkill.numeric' => 'Tingkatan Keahlian harus berupa angka',
            'skills.*.tingkatanSkill.between' => 'Tingkatan Keahlian harus antara 0 dan 100',
        ]);

        $halaman = Halaman::find($id);
        $halaman->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'dataDiri' => $request->dataDiri,
        ]);

        // Perbarui atau tambahkan riwayat pekerjaan
        // dd($request->riwayatPekerjaan);
        foreach ($request->riwayatPekerjaan as $pekerjaan) {
            RiwayatPekerjaan::updateOrCreate(
                // ['id' => $pekerjaan['id']], // Kriteria pencarian berdasarkan ID (jika ID ada)
                [
                    'halaman_id' => $halaman->id,
                    'tgl_mulai' => $pekerjaan['tgl_mulai'],
                    'tgl_akhir' => $pekerjaan['tgl_akhir'],
                    'namaPerusahaan' => $pekerjaan['namaPerusahaan'],
                    'domisilPerusahaan' => $pekerjaan['domisilPerusahaan'],
                    'jabatan' => $pekerjaan['jabatan'],
                ]
            );
        }

        // Perbarui atau tambahkan riwayat pendidikan;
        foreach ($request->riwayatPendidikan as $pendidikan) {
            RiwayatPendidikan::updateOrCreate(
                // ['id' => $pendidikan['id']], // Kriteria pencarian berdasarkan ID (jika ID ada)
                [
                    'halaman_id' => $halaman->id,
                    'thn_mulai' => $pendidikan['thn_mulai'],
                    'thn_akhir' => $pendidikan['thn_akhir'],
                    'namaSekolah' => $pendidikan['namaSekolah'],
                ]
            );
        }

        // Perbarui atau tambahkan skills
        foreach ($request->skills as $skill) {
            Skill::updateOrCreate(
                // ['id' => $skill['id']], // Kriteria pencarian berdasarkan ID (jika ID ada)
                [
                    'halaman_id' => $halaman->id,
                    'namaSkill' => $skill['namaSkill'],
                    'tingkatanSkill' => $skill['tingkatanSkill'],
                ]
            );
        }

    
        return redirect()->route('halaman.index')->with('success', 'Data berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $halaman = halaman::find($id);

        if (!$halaman) {
            return redirect()->route('halaman.index')->with('error', 'Data tidak ditemukan');
        }

        // Hapus semua riwayat pekerjaan yang terkait dengan halaman ini
        RiwayatPekerjaan::where('halaman_id', $halaman->id)->delete();

        // Hapus semua riwayat pendidikan yang terkait dengan halaman ini
        RiwayatPendidikan::where('halaman_id', $halaman->id)->delete();

        // Hapus catatan terkait di tabel 'skills' secara manual
        Skill::where('halaman_id', $halaman->id)->delete();

        // Hapus halaman itu sendiri
        $halaman->delete();

        return redirect()->route('halaman.index')->with('success', 'Data berhasil dihapus');
    }
}
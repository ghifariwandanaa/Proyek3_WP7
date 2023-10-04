<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\RiwayatPekerjaan;
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
            'keahlian' => 'required',
            'dataDiri' => 'required',
            'riwayatPendidikan.*.sekolah' => 'required',
            'riwayatPendidikan.*.jurusan' => 'required',
            'riwayatPendidikan.*.tahun' => 'required',
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
            'keahlian.required' => 'Keahlian Wajib Diisi',
            'dataDiri.required' => 'Deskripsi Diri Wajib Diisi',
            'riwayatPendidikan.*.sekolah.required' => 'Sekolah pada Riwayat Pendidikan Wajib Diisi',
            'riwayatPendidikan.*.jurusan.required' => 'Jurusan pada Riwayat Pendidikan Wajib Diisi',
            'riwayatPendidikan.*.tahun.required' => 'Tahun pada Riwayat Pendidikan Wajib Diisi',
            'riwayatPekerjaan.*.tgl_mulai.required' => 'Tanggal Mulai pada Riwayat Pekerjaan Wajib Diisi',
            'riwayatPekerjaan.*.tgl_akhir.required' => 'Tanggal Akhir pada Riwayat Pekerjaan Wajib Diisi',
            'riwayatPekerjaan.*.tgl_mulai'=> 'Tanggal Mulai pada Riwayat Pekerjaan Wajib Diisi dengan format YYYY-MM-DD',
            'riwayatPekerjaan.*.tgl_akhir'=> 'Tanggal Akhir pada Riwayat Pekerjaan Wajib Diisi dengan format YYYY-MM-DD',
            'riwayatPekerjaan.*.namaPerusahaan.required' => 'namaPerusahaan pada Riwayat Pekerjaan Wajib Diisi',
            'riwayatPekerjaan.*.domisilPerusahaan.required' => 'domisilPerusahaan pada Riwayat Pekerjaan Wajib Diisi',
            'riwayatPekerjaan.*.jabatan.required' => 'jabatan  pada Riwayat Pekerjaan Wajib Diisi',
        ]);
    
        // Simpan data dalam tabel 'halaman'
        $halaman = Halaman::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'riwayatPendidikan'=>$request->riwayatPendidikan,
            'keahlian' => $request->keahlian,
            'dataDiri' => $request->dataDiri,
        ]);
    
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
    
        return redirect()->route('halaman.index');
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
        $halaman = halaman::find($id);

        if (!$halaman) {
            return redirect()->route('halaman.index')->with('error', 'Data tidak ditemukan');
        }

        // Ambil semua riwayat pekerjaan yang terkait dengan halaman ini
        $riwayatPekerjaan = RiwayatPekerjaan::where('halaman_id', $halaman->id)->get();

        return view('dashboard.halaman.edit', compact('halaman', 'riwayatPekerjaan'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'keahlian' => 'required',
            'dataDiri' => 'required',
        ]);

        $halaman = halaman::find($id);

        if (!$halaman) {
            return redirect()->route('halaman.index')->with('error', 'Data tidak ditemukan');
        }

        // Update data pada halaman
        $halaman->update($request->all());

        // Hapus semua riwayat pekerjaan yang terkait dengan halaman ini
        RiwayatPekerjaan::where('halaman_id', $halaman->id)->delete();

        // Simpan data riwayat pekerjaan yang baru
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

        return redirect()->route('halaman.index')->with('success', 'Data berhasil diperbarui');
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

        // Hapus halaman itu sendiri
        $halaman->delete();

        return redirect()->route('halaman.index')->with('success', 'Data berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\halaman;
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
            $request->validate(
            [
                'nama'=>'required',
                'alamat'=>'required',
                'kontak'=>'required',
                'riwayatPendidikan'=>'required',
                'riwayatPekerjaan'=>'required',
                'keahlian'=>'required',
                'dataDiri'=>'required',
            ],
            [
                'nama.required'=>'Nama Wajib Diisi',
                'alamat.required'=>'Alamat Wajib Diisi',
                'kontak.required'=>'Kontak Wajib Diisi',
                'riwayatPendidikan.required'=>'Riwayat Pendidikan Wajib Diisi',
                'riwayatPekerjaan.required'=>'Riwayat Pekerjaan Wajib Diisi',
                'keahlian.required'=>'Keahlian Wajib Diisi',
                'dataDiri.required'=>'Deskripsi Diri Wajib Diisi',   
            ]
        );

        $data=[
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'kontak'=>$request->kontak,
            'riwayatPendidikan'=>$request->riwayatPendidikan,
            'riwayatPekerjaan'=>$request->riwayatPekerjaan,
            'keahlian'=>$request->keahlian,
            'dataDiri'=>$request->dataDiri
        ];
        halaman::create($data);

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
            // Redirect ke halaman indeks jika data tidak ditemukan
            return redirect()->route('halaman.index')->with('error', 'Data tidak ditemukan');
        }
    
        return view('dashboard.halaman.edit')->with('halaman', $halaman);
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
            'riwayatPendidikan' => 'required',
            'riwayatPekerjaan' => 'required',
            'keahlian' => 'required',
            'dataDiri' => 'required',
        ]);

        $halaman = Halaman::find($id);

        if (!$halaman) {
            return redirect()->route('halaman.index')->with('error', 'Data tidak ditemukan');
        }

        $halaman->update($request->all());

        return redirect()->route('halaman.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        halaman::where('id',$id)->delete();
        return redirect()->route('halaman.index')->with('success','berhasil melakukan delete data browww');
    }
}

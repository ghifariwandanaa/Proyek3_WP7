@extends('dashboard.layout')

@section('konten')
<div class="pb-3">
    <a href="{{ route('halaman.index') }}" class="btn btn-secondary">Kembali</a>
</div>
<form action="{{ route('halaman.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control form-control-sm" name="nama" id="nama" 
        placeholder="Nama" value = "{{ $halaman->nama }}">
    </div>

    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control form-control-sm" name="alamat" id="alamat" 
        placeholder="Alamat" value = "{{ $halaman->alamat }}">
    </div>

    <div class="mb-3">
        <label for="kontak" class="form-label">Kontak</label>
        <input type="text" class="form-control form-control-sm" name="kontak" id="kontak" 
        placeholder="Kontak" value = "{{ $halaman->kontak }}">
    </div>

    <div class="mb-3">
        <label for="riwayatPendidikan" class="form-label">Riwayat Pendidikan</label>
        <input type="text" class="form-control form-control-sm" name="riwayatPendidikan" id="riwayatPendidikan" 
        placeholder="Riwayat Pendidikan" value="{{ $halaman->riwayatPendidikan }}">
    </div>

    <div class="mb-3">
        <label for="riwayatPekerjaan" class="form-label">Riwayat Pekerjaan</label>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control form-control-sm" name="riwayatPekerjaan[0][namaPerusahaan]"
                    placeholder="Nama Perusahaan" value="{{ $riwayat_pekerjaann->namaPerusahaan }}" required>
            </div>
            <div class="col">
                <input type="text" class="form-control form-control-sm" name="riwayatPekerjaan[0][domisilPerusahaan]"
                    placeholder="Domisili Perusahaan" value="{{ $riwayat_pekerjaan->domisilPerusahaan }}" required>
            </div>
            <div class="col">
                <input type="text" class="form-control form-control-sm" name="riwayatPekerjaan[0][jabatan]"
                    placeholder="Jabatan" value="{{ $riwayat_pekerjaan->jabatan }}" required>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <div class="row">
            <div class="col-auto">Tanggal Mulai</div>
            <div class="col-auto">
                <input type="text" class="form-control form-control-sm" name="riwayatPekerjaan[0][tgl_mulai]"
                    placeholder="Jabatan" value="{{ $riwayat_pekerjaan->tgl_mulai }}" required>
            </div>
            <div class="col-auto">Tanggal Akhir</div>
            <div class="col-auto">
            <input type="date" class="form-control form-control-sm" name="riwayatPekerjaan[0][tgl_akhir]"
                value="{{ $riwayat_pekerjaan->tgl_akhir }}" required>
            </div>
        </div>
    </div>
        
    
    <div class="mb-3">
        <label for="keahlian" class="form-label">Keahlian</label>
        <input type="text" class="form-control form-control-sm" name="keahlian" id="keahlian" placeholder="Keahlian" value="{{ $halaman->keahlian }}">
    </div>

    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" class="form-control" name="gambar" id="gambar" value="{{ $halaman->gambar }}">
    </div>

    <div class="mb-3">
        <label for="dataDiri" class="form-label">Deskripsi Diri</label>
        <textarea class="form-control" rows="5" name="dataDiri" value="{{ $halaman->dataDiri }}"></textarea>
    </div>

    <button class="btn btn-primary" name="simpan" type="submit">SIMPAN PERUBAHAN</button>
</form>
@endsection

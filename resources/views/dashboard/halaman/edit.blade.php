@extends('dashboard.layout')

@section('konten')
    <div class="pb-3">
        <a href="{{ route('halaman.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <form action="{{ route('halaman.update', ['id' => $halaman->id]) }}" method="post">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ $halaman->nama }}">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $halaman->alamat }}">
        </div>
        <div class="mb-3">
            <label for="kontak" class="form-label">Kontak</label>
            <input type="text" class="form-control" name="kontak" id="kontak" value="{{ $halaman->kontak }}">
        </div>
        <div class="mb-3">
            <label for="riwayatPendidikan" class="form-label">Riwayat Pendidikan</label>
            <input type="text" class="form-control" name="riwayatPendidikan" id="riwayatPendidikan" value="{{ $halaman->riwayatPendidikan }}">
        </div>
        <div class="mb-3">
            <label for="riwayatPekerjaan" class="form-label">Riwayat Pekerjaan</label>
            <input type="text" class="form-control" name="riwayatPekerjaan" id="riwayatPekerjaan" value="{{ $halaman->riwayatPekerjaan }}">
        </div>
        <div class="mb-3">
            <label for="keahlian" class="form-label">Keahlian</label>
            <input type="text" class="form-control" name="keahlian" id="keahlian" value="{{ $halaman->keahlian }}">
        </div>
        <div class="mb-3">
            <label for="dataDiri" class="form-label">Deskripsi Diri</label>
            <textarea class="form-control" rows="5" name="dataDiri">{{ $halaman->dataDiri }}</textarea>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN PERUBAHAN</button>
    </form>
@endsection

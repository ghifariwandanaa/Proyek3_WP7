@extends('dashboard.layout');

@section('konten')
    <div class="pb-3"><a href="{{route('halaman.index')}}"
        class="btn btn-secondary"> Kembali</a>
    </div>
    <form action="{{route('halaman.store')}}"method="post">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text"class="form-control form-control sm" 
          name="nama" id="nama" aria-describedby="helpId" placeholder="Nama">
        </div>
            <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text"class="form-control form-control sm" 
            name="alamat" id="alamat" aria-describedby="helpId" placeholder="Alamat">
            </div>
        <div class="mb-3">
          <label for="kontak" class="form-label">Kontak</label>
          <input type="text"class="form-control form-control sm" 
          name="kontak" id="kontak" aria-describedby="helpId" placeholder="Kontak">
        </div>
        <div class="mb-3">
          <label for="riwayatPendidikan" class="form-label">Riwayat Pendidikan</label>
          <input type="text"class="form-control form-control sm" 
          name="riwayatPendidikan" id="riwayatPendidikan" aria-describedby="helpId" placeholder="Riwayat Pendidikan">
        </div>
        <div class="mb-3">
          <label for="riwayatPekerjaan" class="form-label">Riwayat Pekerjaan</label>
          <input type="text"class="form-control form-control sm" 
          name="riwayatPekerjaan" id="riwayatPekerjaan" aria-describedby="helpId" placeholder="Riwayat Pekerjaan">
        </div>
        <div class="mb-3">
          <label for="keahlian" class="form-label">Keahlian</label>
          <input type="text"class="form-control form-control sm" 
          name="keahlian" id="keahlian" aria-describedby="helpId" placeholder="Keahlian">
        </div>
           <div class="mb-3">
            <label for="datadiri" class="form-label">Deskripsi Diri</label>
            <textarea class="form-control" rows="5" name="datadiri"></textarea>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
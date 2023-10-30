@extends('dashboard.layout')

@section('konten')
<div class="pb-3"><a href="{{ route('halaman.index') }}" class="btn btn-secondary">Kembali</a></div>

<form  action="{{ route('halaman.update', ['id' => $halaman->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="Nama" value="{{ $halaman->nama }}">
    </div>

    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control form-control sm" name="alamat" id="alamat" aria-describedby="helpId" placeholder="Alamat" value="{{ $halaman->alamat }}">
    </div>

    <div class="mb-3">
        <label for="kontak" class="form-label">Kontak</label>
        <input type="text" class="form-control form-control sm" name="kontak" id="kontak" aria-describedby="helpId" placeholder="Kontak" value="{{ $halaman->kontak }}">
    </div>

    <!-- Riwayat Pendidikan -->
    <div class="mb-3">
        <label for="riwayatPendidikan" class="form-label">Riwayat Pendidikan</label>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Sekolah/Universitas</th>
                    <th>Tahun Masuk</th>
                    <th>Tahun Keluar</th>
                </tr>
            </thead>
            <tbody id="Pendidikan">
                @foreach ($riwayatPendidikan as $index => $pendidikan)
                    <tr>
                        <td><input type="text" class="form-control" name="riwayatPendidikan[{{ $index }}][namaSekolah]" placeholder="Nama Sekolah/Universitas" value="{{ $pendidikan->namaSekolah }}" required></td>
                        <td><input type="text" class="form-control" name="riwayatPendidikan[{{ $index }}][thn_mulai]" placeholder="Tahun Masuk" value="{{ $pendidikan->thn_mulai }}" required></td>
                        <td><input type="text" class="form-control" name="riwayatPendidikan[{{ $index }}][thn_akhir]" placeholder="Tahun Keluar" value="{{ $pendidikan->thn_akhir }}" required></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-secondary" id="tambahRiwayatPendidikan">Tambah Riwayat Pendidikan</button>
    </div>


    <!-- Riwayat Pekerjaan -->
    <div class="mb-3">
        <label for="riwayatPekerjaan" class="form-label">Riwayat Pekerjaan</label>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Perusahaan</th>
                    <th>Domisili Perusahaan</th>
                    <th>Jabatan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
                </tr>
            </thead>
            <tbody id="Pekerjaan">
                @foreach ($riwayatPekerjaan as $index => $pekerjaan)
                    <tr>
                        <td><input type="text" class="form-control" name="riwayatPekerjaan[{{ $index }}][namaPerusahaan]" placeholder="Nama Perusahaan" value="{{ $pekerjaan->namaPerusahaan }}" required></td>
                        <td><input type="text" class="form-control" name="riwayatPekerjaan[{{ $index }}][domisilPerusahaan]" placeholder="Domisili Perusahaan" value="{{ $pekerjaan->domisilPerusahaan }}" required></td>
                        <td><input type="text" class="form-control" name="riwayatPekerjaan[{{ $index }}][jabatan]" placeholder="Jabatan" value="{{ $pekerjaan->jabatan }}" required></td>
                        <td><input type="date" class="form-control" name="riwayatPekerjaan[{{ $index }}][tgl_mulai]" value="{{ $pekerjaan->tgl_mulai }}" required></td>
                        <td><input type="date" class="form-control" name="riwayatPekerjaan[{{ $index }}][tgl_akhir]" value="{{ $pekerjaan->tgl_akhir }}" required></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-secondary" id="tambahRiwayatPekerjaan">Tambah Riwayat Pekerjaan</button>
    </div>

    <div class="mb-3">
        <label for="hardskill" class="form-label">Skills</label>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Skill</th>
                    <th>Tingkat (%)</th>
                </tr>
            </thead>
            <tbody id="hardSkill">
            @foreach($skills as $index => $skill)
                <tr>
                    <td><input type="text" class="form-control" name="skills[{{ $index }}][namaSkill]" value="{{ $skill->namaSkill }}" placeholder="Nama Skill" required></td>
                    <td><input type="number" class="form-control" name="skills[{{ $index }}][tingkatanSkill]" value="{{ $skill->tingkatanSkill }}" placeholder="Tingkat (%) (0-100)" required></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-secondary" id="tambahSkill">Tambah skill</button>
    </div>

    <div class="mb-3">
        <label for="dataDiri" class="form-label">Deskripsi Diri</label>
        <textarea class="form-control" rows="5" name="dataDiri">{{ $halaman->dataDiri }}</textarea>
    </div>

        <button class="btn btn-primary" name="simpan" type="submit">UPDATE</button>
    </div>
</form>

<script>
    let riwayatPekerjaanIndex = {{ count($riwayatPekerjaan) }};

    document.getElementById('tambahRiwayatPekerjaan').addEventListener('click', function() {
        let newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td><input type="text" class="form-control" name="riwayatPekerjaan[${riwayatPekerjaanIndex}][namaPerusahaan]" placeholder="Nama Perusahaan" required></td>
            <td><input type="text" class="form-control" name="riwayatPekerjaan[${riwayatPekerjaanIndex}][domisilPerusahaan]" placeholder="Domisili Perusahaan" required></td>
            <td><input type="text" class="form-control" name="riwayatPekerjaan[${riwayatPekerjaanIndex}][jabatan]" placeholder="Jabatan" required></td>
            <td><input type="date" class="form-control" name="riwayatPekerjaan[${riwayatPekerjaanIndex}][tgl_mulai]" required></td>
            <td><input type="date" class="form-control" name="riwayatPekerjaan[${riwayatPekerjaanIndex}][tgl_akhir]" required></td>
        `;
        document.getElementById('Pekerjaan').appendChild(newRow);
        riwayatPekerjaanIndex++;
    });

    let riwayatPendidikanIndex = {{ count($riwayatPendidikan) }};
    document.getElementById('tambahRiwayatPendidikan').addEventListener('click', function() {
        let newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td><input type="text" class="form-control" name="riwayatPendidikan[${riwayatPendidikanIndex}][namaSekolah]" placeholder="Nama Sekolah/Universitas" required></td>
            <td><input type="text" class="form-control" name="riwayatPendidikan[${riwayatPendidikanIndex}][thn_mulai]" placeholder="Tahun Masuk" required></td>
            <td><input type="text" class="form-control" name="riwayatPendidikan[${riwayatPendidikanIndex}][thn_akhir]" placeholder="Tahun Keluar" required></td>
        `;
        document.getElementById('Pendidikan').appendChild(newRow);
        riwayatPekerjaanIndex++;
    });

    let hardSkillIndex = {{ count($skills) }};
    // console.log("Nilai dari hardSkillIndex adalah: " + hardSkillIndex);
    document.getElementById('tambahSkill').addEventListener('click', function() {
        let newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td><input type="text" class="form-control" name="skills[${hardSkillIndex}][namaSkill]" placeholder="Nama Skill" required></td>
            <td><input type="number" class="form-control" name="skills[${hardSkillIndex}][tingkatanSkill]" placeholder="Tingkat (%) (0-100)" required></td>
        `;
        document.getElementById('hardSkill').appendChild(newRow);
        hardSkillIndex++;
    });





</script>
</div>
@endsection
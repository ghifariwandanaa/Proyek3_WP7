<!DOCTYPE html>
<html lang="en">

<head>
    <title>CV - {{ optional($profile->user)->name }}</title>
    <style>
        /* about.css */

        body {
            font-family: 'Times New Roman', serif;
            margin: 0;
            padding: 0;
            background-color: white;
            color: #333;
        }

        div {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        h2 {
            color: #343a40;
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }

        p {
            margin-bottom: 10px;
        }

        .center {
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }

        /* Style links */
        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Your HTML content goes here -->
    <div>
        <h1>{{ $profile->nama }}</h1>
        <p class="center">Alamat : {{$profile->alamat}} | No Telp : {{$profile->kontak}}</p>
        <h2>Tentang Saya</h2>
        <p>{{ $profile->dataDiri }}</p>

        <!-- Riwayat Pendidikan -->
        <h2>Riwayat Pendidikan</h2>
        @foreach ($riwayatPendidikan as $pendidikan)
        @if ($pendidikan->thn_akhir !== '-')
        <p>{{ $pendidikan->thn_mulai }} - {{ $pendidikan->thn_akhir }}: {{ $pendidikan->namaSekolah }}</p>
        @else
        <p>{{ $pendidikan->thn_mulai }} - Sekarang: {{ $pendidikan->namaSekolah }}</p>
        @endif
        @endforeach


        <!-- Riwayat Pekerjaan -->
        <h2>Riwayat Pekerjaan</h2>
        @foreach ($riwayatPekerjaan as $pekerjaan)
        <p>{{ $pekerjaan->tgl_mulai }} sd. {{ $pekerjaan->tgl_akhir }}: {{ $pekerjaan->namaPerusahaan }} - {{
            $pekerjaan->domisilPerusahaan }}</p>
        <p>Jabatan: {{ $pekerjaan->jabatan }}</p>
        @endforeach

        <!-- Keahlian -->
        <h2>Keahlian</h2>
        <ul>
            @foreach ($keahlian as $skill)
            <li>{{ $skill->namaSkill }}: {{ $skill->tingkatanSkill }}</li>
            @endforeach
        </ul>
    </div>
</body>

</html>
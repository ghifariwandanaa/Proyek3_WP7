<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Welcome to Web Personal Profile</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link href="https://use.fontawesome.com/releases/v6.1.0/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css">
    <link href="{{ asset('depan') }}/css/about.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="images1" href="/cv">
                        <img src="{{ asset('admin') }}/images/faces/back.png" alt="profile" width="60" height="60">
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Isi dari Cv -->
    <div class="container">
        <div class="profile">
            <div class="profile_container">
                <div class="profile_profileImg">
                    <img class="images" src="{{ asset('storage/' . $data['profile']->gambar) }}" alt="profile" />
                    <a class="downloadBtn" href="./cv.pdf" download="Resume.pdf">Download Resume</a>
                    <a href="{{ route('profile.edit', $data['profile']->id) }}" class="downloadBtn">Edit</a>
                </div>
                <div>
                    <h1 class="profile_name">
                        <span class="profile_name_lastName">{{ $data['profile']->nama }}</span>
                    </h1>
                    <p class="profile_title">DESKRIPSI DIRI</p>
                    <p class="description profile_description">
                        {{ $data['profile']->dataDiri }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container1">
        <div class="profile">
            <div class="group-1">
                <div class="edu">
                    <h3 class="title">Riwayat Pendidikan</h3>
                    <div class="edu_item">
                        @foreach ($data['riwayatPendidikan'] as $riwayatpd)
                        <div class="item_preTitle">{{ $riwayatpd->thn_mulai }} - {{ $riwayatpd->thn_akhir }}</div>
                        <p class="item_subtitle">{{ $riwayatpd->namaSekolah }}</p>
                        @endforeach
                    </div>
                </div>

                <div class="exp">
                    <h3 class="title">Riwayat Pekerjaan</h3>
                    <div class="exp_item">
                        @foreach ($data['riwayatPekerjaan'] as $riwayatpk)
                        <div class="item_preTitle">{{ $riwayatpk->tgl_mulai }} sd. {{ $riwayatpk->tgl_akhir }}</div>
                        <p class="item_preTitle">{{ $riwayatpk->namaPerusahaan }} - {{ $riwayatpk->domisilPerusahaan }}</p>
                        <p class="item_subtitle">{{ $riwayatpk->jabatan }}</p>
                        @endforeach
                    </div>
                </div>

                <div class="skills">
                    <h3 class="title">Keahlian</h3>
                    <ul class="skills_list description">
                        @foreach ($data['keahlian'] as $keahlian)
                        <li>
                            <span class="skill-name">{{ $keahlian->namaSkill }}:</span>
                            <span class="skill-percent">{{ $keahlian->tingkatanSkill }}%</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="group-2">
                <div class="contact">
                    <h3 class="title">Kontak</h3>
                    <div class="contact_info">
                        <p class="description">{{ $data['profile']->kontak }}</p>
                    </div>
                </div>

                <div class="social">
                    <h3 class="title">Alamat</h3>
                    <a href="#" target="_blank" class="social_item">
                        <i class="fab fa-github"></i>
                        <span>{{ $data['profile']->alamat }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        feather.replace()
    </script>
</body>

</html>

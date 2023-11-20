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
                    <p class="title">DESKRIPSI DIRI</p>
                    <p class="description profile_description">
                        {{ $data['profile']->dataDiri }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Ini Buat isi Resume -->
        <!-- Riwayat Pendidikan -->
        <section id="resume-education" class="resume">
            <div class="container1" data-aos="fade-up">
                <div class="section-title">
                    <h2>Riwayat Pendidikan</h2>
                </div>
                <div class="row">
                        <div class="resume-item pb-0">
                            @foreach ($data['riwayatPendidikan'] as $riwayatpd)
                            <h5>{{ $riwayatpd->thn_mulai }} - {{ $riwayatpd->thn_akhir }}</h5>
                            <h4>{{ $riwayatpd->namaSekolah }}</h4>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Riwayat Pekerjaan -->
        <section id="resume-experience" class="resume">
            <div class="container1" data-aos="fade-up">
                <div class="section-title">
                    <h2>Riwayat Pekerjaan</h2>
                </div>
                <div class="row">
                        <div class="resume-item pb-0">
                            @foreach ($data['riwayatPekerjaan'] as $riwayatpk)
                            <h5>{{ $riwayatpk->tgl_mulai }} sd. {{ $riwayatpk->tgl_akhir }}</h5>
                            <p class="item_preTitle">{{ $riwayatpk->namaPerusahaan }} - {{ $riwayatpk->domisilPerusahaan }}</p>
                            <p class="item_subtitle">{{ $riwayatpk->jabatan }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Skills -->
        <section id="skills" class="skills section-bg">
            <div class="container1" data-aos="fade-up">
                <div class="section-title">
                    <h2>Keahlian</h2>
                    <!-- Container for Keterangan -->
                    <div class="keterangan-container">
                        <div class = "title1" >Keterangan :</div>
                        <div class = "text-keterangan"
                        <p>Merah => Pemula</p>
                        <p>Kuning => Menengah</p>
                        <p>Hijau => Mahir</p>
                    </div>
                    </div>
                </div>

                <div class="row skills-content">
                    <div class="progress">
                        @foreach ($data['keahlian'] as $keahlian)
                            <li>
                                <span class="skill">{{ $keahlian->namaSkill }}:<i class="val">{{ $keahlian->tingkatanSkill }}</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar @if($keahlian->tingkatanSkill < 50) red @elseif($keahlian->tingkatanSkill < 75) yellow @else green @endif"
                                        role="progressbar">
                                    </div>
                                    
                                </div>
                            </li>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>


        <!-- Kontak -->
        <section id="contact" class="contact">
            <div class="container1" data-aos="fade-up">
            <div class="section-title">
                <h2>Contact</h2>
            </div>

                <div class="row">
                    <div class="info">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Location:</h4>
                        <p>{{ $data['profile']->alamat }}</p>
                    </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>{{ $data['profile']->kontak }}</p>
                        </div>
                </div>
                </div>
            </div>
        </section>

    <script>
        feather.replace()
    </script>
</body>

</html>

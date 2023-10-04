<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>About me</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('depan') }}/css/about.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">{{ $data->judul }}</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="left-container" href="/dashboard/depan">Back to Dashboard</a></li>
            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section-conten" id="about">
            <div class="resume-section-content">
                <div class="about-content">
                <h1>About Me</h1>
                <button id="toggleButton">Show Data</button>
                <div id="about-details" style="display: none;">
                <p><strong>Nama:</strong> {{ $data->nama }}</p>
                <p><strong>Alamat:</strong> {{ $data->alamat }}</p>
                <p><strong>Kontak:</strong> {{ $data->kontak }}</p>
                <p><strong>Riwayat Pendidikan:</strong> {{ $data->riwayatPendidikan }}</p>
                <p><strong>Riwayat Pekerjaan:</strong></p>
                <ul>
                    @if ($data->riwayatPekerjaan)
                        @foreach ($data->riwayatPekerjaan as $pekerjaan)
                            <li>
                                    <strong>Tanggal Mulai:</strong> {{ $pekerjaan['tgl_mulai'] }}<br>
                                    <strong>Tanggal Akhir:</strong> {{ $pekerjaan['tgl_akhir'] }}<br>
                                    <strong>Info 1:</strong> {{ $pekerjaan['info1'] }}<br>
                                    <strong>Info 2:</strong> {{ $pekerjaan['info2'] }}<br>
                                    <strong>Info 3:</strong> {{ $pekerjaan['info3'] }}<br>
                            </li>
                        @endforeach
                    @else
                        <li>Tidak ada riwayat pekerjaan yang tersedia.</li>
                    @endif
                </ul>
                <p><strong>Keahlian:</strong> {{ $data->keahlian }}</p>
                <p><strong>Data Diri:</strong> {{ $data->dataDiri }}</p>
                <button id="download-cv-button">Download CV</button>
            </div>
        </div>
            </div>
        </section>
        <hr class="m-0" />
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('depan') }}/js/scripts.js"></script>
</body>

</html>
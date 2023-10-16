<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Welcome to Web Personal Profile</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <link href="{{ asset('depan') }}/css/about.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">

</head>

<body id="page-top">
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
    
    <div class="container-fluid p-0">
        
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
                <p><strong>Riwayat Pekerjaan:</strong> {{ $data->riwayatPekerjaan }}</p>
                <p><strong>Keahlian:</strong> {{ $data->keahlian }}</p>
                <p><strong>Data Diri:</strong> {{ $data->dataDiri }}</p>
                <button id="download-cv-button">Download CV</button>
            </div>
        </div>
            </div>
        </section>
        <hr class="m-0" />
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="{{ asset('depan') }}/js/scripts.js"></script>
</body> -->

<!-- </html> -->

<!-- nyoba yang lain -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Welcome to Web Personal Profile</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <link href="{{ asset('depan') }}/css/about.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">

</head>

<body>
    <!-- Navigation -->
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
    <!-- Isi dari Cv -->
  <div class="container">
    <div class="profile">
      <div class="profile_container">
        <div class="profile_profileImg">
          <img src="./images/profileImage.png" alt="shaif arfan">
        </div>
        <div>
          <h1 class="profile_name">
            <span class="profile_name_lastName">{{ $data->nama }}</span>
            
          </h1>
          <p class="profile_title">DESKRIPSI DIRI</p>
          <p class="description profile_description">
          {{ $data->dataDiri }}
          </p>
          <a class="downloadBtn" href="./cv.pdf" download="Resume.pdf">Download Resume</a>
        </div>
      </div>
    </div>
    <div class="group-1">
      <div class="skills">
        <h3 class="title">Keahlian</h3>
        <ul class="skills_list description">
          <li>{{ $data->keahlian }}</li>
        </ul>
      </div>

      <div class="edu">
        <h3 class="title">Riwayat Pendidikan</h3>
        <div class="edu_item">
          <p class="item_preTitle">2012-2014</p>
          <h4 class="item_title">MSC in CSE</h4>
          <p class="item_subtitle">
            Chittagong University
          </p>
        </div>
        <div class="edu_item">
          <p class="item_preTitle">2008-2012</p>
          <h4 class="item_title">BSC in CSE</h4>
          <p class="item_subtitle">
            Chittagong University
          </p>
        </div>
      </div>

      
    </div>
    <div class="group-2">
      <div class="exp">
        <h3 class="title">Riwayat Pekerjaan</h3>
        <div class="exp_item">
          <p class="item_preTitle">2019 - present</p>
          <h4 class="item_title">Rashid Software LTD.</h4>
          <p class="item_subtitle">Frontend Developer</p>
          <p class=" description">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore
            magna aliqua. Ut enim ad minim veniam,
          </p>
        </div>
        <div class="exp_item">
          <p class="item_preTitle">2019 - present</p>
          <h4 class="item_title">Rashid Software LTD.</h4>
          <p class="item_subtitle">Frontend Developer</p>
          <p class="description">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore
            magna aliqua. Ut enim ad minim veniam,
          </p>
        </div>
      </div>
    
      </div>
    </div>
    <hr>
    <div class="group-3">
      <div class="contact">
        <h3 class="title">Kontak</h3>
        <div class="contact_info">
          <p class="description">
          {{ $data->kontak }}
          </p>
          <p class="description">
            shaifarfan08@gmail.com
          </p>
        </div>
      </div>
      <div class="social">
        <h3 class="title">Alamat</h3>
        <div class="social_items">
          <a href="#" target="_b" class="social_item">
            <i data-feather="github"></i>
            <span>{{ $data->alamat }}</span>
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
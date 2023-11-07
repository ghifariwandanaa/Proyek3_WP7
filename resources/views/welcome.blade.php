<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('admin') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/css/style.css">
    <link rel="stylesheet" href="welcome/css/styles.css">
    <link rel="shortcut icon" href="{{ asset('admin') }}/images/favicon.png" />
</head>

<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Proyek 3</h2>
            </div class>
                <ul>
                    <li><a href="aboutweb">ABOUT</a></li>
                </ul>
                <ul>
                    <li><a href="cv">CV</a></li>
                </ul>

            <div class="right-menu">
                <ul>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                            <img class="images" src="{{ asset('admin') }}/images/faces/OIP.jpg" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{ route('depan.index') }}">
                                <i class="mdi mdi-account text-primary"></i>
                                Profile
                            </a>
                            <a class="dropdown-item">
                                <i class="mdi mdi-settings text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item">
                                <i class="mdi mdi-logout text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
        <div class="content">
            <h1>Welcome to <br><span>Web Personal Profile</span> <br></h1>
            <h2>About</h2>
            <p class="par"> WPP adalah sebuah platform berbasis web yang dirancang
                khusus untuk membantu individu membuat Curriculum Vitae (CV) profesional mereka sendiri dengan mudah, cepat, dan efisien.
                Dengan "CV Creator," Anda dapat menghasilkan CV yang menarik dan berkualitas tinggi tanpa harus memiliki pengetahuan
                mendalam dalam desain grafis atau keahlian teknis lainnya.
                <br></p>
            <h2>Fitur</h2>
            <ul class="par2">
                <li>
                    <p><strong> SIMPAN SEBAGAI PDF:</strong></p>
                    <p>Anda dapat mengunduhnya dalam format PDF.</p>
                </li>
                <li>
                    <p><strong>BUAT CV SECARA GRATIS:</strong></p>
                    <p>Anda dapat membuat CV Anda secara gratis.</p>
                </li>
                <li>
                    <p><strong>MEMBUAT DENGAN MUDAH</strong></p>
                    <p>Anda dapat dengan mudah membuat CV.</p>
                </li>
            </ul>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="{{ asset('admin') }}/vendors/base/vendor.bundle.base.js"></script>
    <script src="{{ asset('admin') }}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('admin') }}/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{ asset('admin') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('admin') }}/js/off-canvas.js"></script>
    <script src="{{ asset('admin') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('admin') }}/js/template.js"></script>
    <script src="{{ asset('admin') }}/js/dashboard.js"></script>
    <script src="{{ asset('admin') }}/js/data-table.js"></script>
    <script src="{{ asset('admin') }}/js/jquery.dataTables.js"></script>
    <script src="{{ asset('admin') }}/js/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('admin') }}/js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>

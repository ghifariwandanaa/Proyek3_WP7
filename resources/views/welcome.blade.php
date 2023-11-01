<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link href="welcome/css/styles.css" rel="stylesheet" />
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Proyek 3</h2>
            </div>

            <div class="menu">
                <ul class>
                    <li><a href="aboutweb">ABOUT</a></li>
                    <li><a href="{{ route('cv.index') }}">CV</a></li>

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
</body>
</html>
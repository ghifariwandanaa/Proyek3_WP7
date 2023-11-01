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
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">SERVICE</a></li>
                    <li><a href="#">DESIGN</a></li>
                    <li><a href="#">CONTACT</a></li>
                </ul>
            </div>

            <div class="search">
                <input class="srch" type="search" name="" placeholder="Type To text">
                <a href="#"> <button class="btn">Search</button></a>
            </div>

        </div> 
        <div class="content">
            <h1>Welcome to <br><span>Web Personal</span> <br>Profile</h1>
            <p class="par">Website ini menyediakan akses tempat untuk personal branding anda. <br> Beberapa perusahaan akan mencari anda, persiapkan Curriculum Vitae sebagus mungkin!
                <br></p>

                <button class="cn"><a href="{{route('profile.index')}}">JOIN US</a></button>

        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
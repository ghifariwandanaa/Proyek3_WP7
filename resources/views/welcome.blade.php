@extends('dashboard.layout2')

@section('konten2')
<div class="content">
    <h1>Welcome to <br><span>Web Personal Profile</span> <br></h1>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="welcome/assets/img/1.jpg" class="d-block w-100" alt="..." width="500" height="500">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Membuat CV dengan mudah</h5>
                    <p>Anda dapat dengan mudah membuat CV secara praktis.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="welcome/assets/img/2.jpg" class="d-block w-100" alt="..." width="500" height="500">
                <div class="carousel-caption d-none d-md-block">
                    <h5>MEMBUAT CV SECARA GRATIS</h5>
                    <p>Anda dapat membuat CV Anda secara gratis.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="welcome/assets/img/3.jpg" class="d-block w-100" alt="..." width="500" height="500">
                <div class="carousel-caption d-none d-md-block">
                    <h5>SIMPAN SEBAGAI PDF</h5>
                    <p>Anda dapat mengunduhnya dalam format PDF.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <h2>About</h2>
    <p class="par"> WPP adalah sebuah platform berbasis web yang dirancang
        khusus untuk membantu individu membuat Curriculum Vitae (CV) profesional mereka sendiri dengan mudah, cepat, dan efisien.
        Dengan "CV Creator," Anda dapat menghasilkan CV yang menarik dan berkualitas tinggi tanpa harus memiliki pengetahuan
        mendalam dalam desain grafis atau keahlian teknis lainnya.
        <br></p>
</div>
@endsection
    
@extends('dashboard.layout')

@section('konten')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="form text-center">
        <h2>Login Here</h2>
        <input type="email" name="email" placeholder="Enter Email Here" class="form-control mb-2">
        <input type="password" name="password" placeholder="Enter Password Here" class="form-control mb-2">
        <button class="btn btn-primary btn-block mb-2">Login</button>

        <p class="link">Don't have an account<br>
        <a href="#">Sign up</a> here</p>
        <p class="liw">Log in with</p>

        <div class="icons">
            <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
            <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
            <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
            <a href="#"><ion-icon name="logo-google"></ion-icon></a>
            <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
        </div>
    </div>
</div>
@endsection

@extends('dashboard.layout2')

@section('konten2')

@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col text-center" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show col text-center" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('verified'))
    <div class="alert alert-success alert-dismissible fade show col text-center" role="alert">
        Email Anda berhasil diverifikasi. Silakan login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<div class="container d-flex justify-content-center align-items-center vh-100">
    <form class="text-center" action="/login" method="post">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror"  
                name="email" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message  }} 
                    </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror"  
                name="password" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message  }} 
                    </div>
                @enderror
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="{{ url('auth/google') }}" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign in using Google+
                </a>
            </div>
            <p class="mb-0">
                Belum mempunyai akun?
                <a href="/register" class="text-center">Register</a>
            </p>
    </form>
</div>
@endsection
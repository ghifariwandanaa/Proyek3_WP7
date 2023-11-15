@extends('dashboard.layout2')

@section('konten2')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <form class="text-center" action='/register' method='post'>
        @csrf
        <h1 class="h3 mb-3 fw-normal">Registration</h1>

        <div class="form-floating">
            <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" 
            name="name" id="name" placeholder="Name" required value="{{ old('name') }}">
            <label for="name">Nama</label>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message  }} 
                </div>
            @enderror
        </div>

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
            <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message  }} 
                </div>
            @enderror
        </div>
        
        <button class="btn btn-primary w-100 py-2" type="submit">Daftar</button>
        <p class="mb-0">
                Sudah mempunyai akun?
            <a href="/login" class="text-center">Login</a>
        </p>

    </form>
</div>
@endsection
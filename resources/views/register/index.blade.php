@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-registration w-100 m-auto">
            <h1 class="h2 mb-5 fw-bold text-center">Register</h1>
            <form action="/register" method="post">
            @csrf
            <div class="form-floating">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" value="{{ old('name') }}">
                <label for="name">Nama</label>
                @error('name')    
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
              <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" id="nim" placeholder="nim" value="{{ old('nim') }}">
              <label for="nim">NIM/NIP</label>
              @error('nim')    
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email" value="{{ old('email') }}">
                <label for="email">Email</label>
                @error('email')    
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="no_hp" value="{{ old('no_hp') }}">
                <label for="no_hp">Nomor Hp <small> (isi dengan format 62)</small></label>
                @error('no_hp')    
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="password">
                <label for="password">Password</label>
                @error('password')    
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <button class="mt-4 w-100 btn btn-lg btn-dark" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Sudah Punya Akun? <a href="/login" class="text-decoration-none">Login!</a></small>
        </main>
    </div>
</div>
@endsection
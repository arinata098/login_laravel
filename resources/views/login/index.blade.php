@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-4">

      {{-- cek status registration --}}
      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong> Please Login
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      {{-- cek status login error --}}
      @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('loginError') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal">Please Login</h1>
            <form action="/login" method="POST">
              @csrf
              {{-- <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" placeholder="name@example.com" autofocus required >
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback mb-1">
                  {{ $message }}
                </div>
                @enderror
              </div> --}}
              <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username') }}" placeholder="name@example.com" autofocus required >
                <label for="username">username address</label>
                @error('username')
                <div class="invalid-feedback mb-1">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                {{-- @error('password')
                <div class="invalid-feedback mb-1">
                  {{ $message }}
                </div>
                @enderror --}}
              </div>
          
              <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
            <small class="d-block mt-3 text-center">Not register ? <a href="/register">Registration</a></small>
        </main>
    </div>
</div>



@endsection
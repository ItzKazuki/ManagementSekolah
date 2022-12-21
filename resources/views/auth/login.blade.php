@extends('layouts.auth')

@section('body')
<div class="auto-form-wrapper">
  <form action="{{ route('auth.login.post') }}" method="post">
    @csrf
    <div class="form-group">
      <label class="label" for="email">Email</label>
      <div class="input-group">
        <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email">
        <div class="input-group-append">
          <span class="input-group-text">
            <i class="mdi mdi-check-circle-outline"></i>
          </span>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="label" for="password">Password</label>
      <div class="input-group">
        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="*********" id="password" name="password">
        <div class="input-group-append">
          <span class="input-group-text">
            <i class="mdi mdi-check-circle-outline"></i>
          </span>
        </div>
      </div>
    </div>
    <div class="form-group">
      <button class="btn btn-primary submit-btn btn-block">Login</button>
    </div>
    <div class="form-group d-flex justify-content-between">
      <div class="form-check form-check-flat mt-0">
        <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
        <label class="form-check-label" for="remember_me">Keep me signed in </label>
      </div>
      <a href="{{ route('auth.forgot.password') }}" class="text-small forgot-password text-black">Forgot Password</a>
    </div>
    <div class="form-group">
      <button class="btn btn-block g-login">
        <img class="mr-3" src="/assets/images/file-icons/icon-google.svg" alt="">Log in with Google</button>
    </div>
    <div class="text-block text-center my-3">
      <span class="text-small font-weight-semibold">Not a member ?</span>
      <a href="{{ route('auth.register') }}" class="text-black text-small">Create new account</a>
    </div>
  </form>
</div>
@endsection
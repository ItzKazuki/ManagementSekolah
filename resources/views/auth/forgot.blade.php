@extends('layouts.auth')

@section('body')
<h2 class="text-center mb-4 text-white">Forgot Password</h2>
<div class="auto-form-wrapper">
  <form action="{{ route('auth.forgot.password.post') }}" method="post">
    @csrf
    <div class="form-group">
      <label class="label" for="email">Email</label>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="someone@example.com" id="email" name="email">
        <div class="input-group-append">
          <span class="input-group-text">
            <i class="mdi mdi-check-circle-outline"></i>
          </span>
        </div>
      </div>
    </div>
    <div class="form-group">
      <button class="btn btn-primary submit-btn btn-block">Reset Password</button>
    </div>
    <div class="text-block text-center my-3">
      <span class="text-small font-weight-semibold">Sudah punya akun ?</span>
      <a href="{{ route('auth.login') }}" class="text-black text-small">Login</a>
    </div>
    
  </form>
</div>
@endsection
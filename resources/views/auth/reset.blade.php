@extends('layouts.auth')

@section('body')
<h2 class="text-center mb-4 text-white">Reset Password</h2>
<div class="auto-form-wrapper">
  <form action="{{ route('auth.reset.password.post') }}" method="post">
    @csrf
    <input type="hidden" name="email" id="email" value="{{ $email }}">
    <input type="hidden" name="token" id="token" value="{{ $token }}">
    <div class="form-group">
      <label class="label" for="new_password">Password</label>
      <div class="input-group">
        <input type="password" class="form-control" placeholder="*********" id="new_password" name="new_password">
        <div class="input-group-append">
          <span class="input-group-text">
            <i class="mdi mdi-check-circle-outline"></i>
          </span>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="label" for="password_confirmation">Confirm Password</label>
      <div class="input-group">
        <input type="password" class="form-control" placeholder="*********" id="password_confirmation" name="password_confirmation">
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
      <a href="{{ route('auth.register') }}" class="text-black text-small">Login</a>
    </div>
  </form>
</div>
@endsection
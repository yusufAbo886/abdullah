@extends('layouts.app')

@section('content')


<form method="POST" action="{{ route('login') }}">
    @csrf
  <h1>Admin Log in</h1>
  <div class="inset">
  <p>
    <label for="email">EMAIL ADDRESS</label>
    <input   class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}"  type="email" name="email" id="email" required autocomplete="email" >
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </p>
  <p>

    <label for="password">PASSWORD</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </p>
  <p>

    <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    <label for="remember">Remember me for 14 days</label>
  </p>
  </div>
  <p class="p-container">
    <!-- <span>Forgot password ?</span> -->
    <input type="submit"  value="Log in">
  </p>
</form>
@endsection

@extends('layouts.header')
@section('content')
@if(isset(Auth::user()->email))
<script>window.location="/main/successlogin";</script>
@endif
<div class="card">
   <div class="card-header">
      <h3>Sign In</h3>
      @include('includes.form-error')
      @if ($message = Session::get('error'))
      <div class="alert alert-danger alert-block">
         <strong>{{ $message }}</strong>
      </div>
      @endif
      @if (Session::has('success'))
      <div class="alert alert-success">
         <p>{{ Session::get('success') }}</p>
      </div>
      @endif
      <div class="d-flex justify-content-end social_icon">
         <span><i class="fab fa-facebook-square"></i></span>
         <span><i class="fab fa-google-plus-square"></i></span>
         <span><i class="fab fa-twitter-square"></i></span>
      </div>
   </div>
   <div class="card-body">
      <form method="post" action="{{ url('/main/checklogin') }}">
         {{ csrf_field() }}
         <div class="input-group form-group">
            <div class="input-group-prepend">
               <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="email" name="email" class="form-control" placeholder="email"/>
         </div>
         <div class="input-group form-group">
            <div class="input-group-prepend">
               <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="password" class="form-control" placeholder="password">
         </div>
         <div class="row align-items-center remember">
            <input type="checkbox">Remember Me
         </div>
         <div class="form-group">
            <input type="submit" value="Login" class="btn float-right login_btn">
         </div>
      </form>
   </div>
   <div class="card-footer">
      <div class="d-flex justify-content-center links">
         Don't have an account?<a href="{{ route('register') }}">Sign Up</a>
      </div>
      <div class="d-flex justify-content-center">
         @if (Route::has('password.request'))
         <p><a href="{{ route('password.request') }}">Forgot My Password</a></p>
         @endif
      </div>
   </div>
</div>
</div>
@endsection
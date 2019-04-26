@extends('layouts.header')
@section('content')
<div class="card">
   <div class="card-header">
      <h3>Sign Up</h3>
      @include('includes.form-error')
      <div class="d-flex justify-content-end social_icon">
         <span><i class="fab fa-facebook-square"></i></span>
         <span><i class="fab fa-google-plus-square"></i></span>
         <span><i class="fab fa-twitter-square"></i></span>
      </div>
   </div>
   <div class="card-body">
      <form method="post" action="{{ url('/register/checkRegister') }}">
         {{ csrf_field() }}
         <div class="input-group form-group">
            <div class="input-group-prepend">
               <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="name" class="form-control" placeholder="Name"/>
         </div>
         <div class="input-group form-group">
            <div class="input-group-prepend">
               <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" name="email" class="form-control" placeholder="Email"/>
         </div>
         <div class="input-group form-group">
            <div class="input-group-prepend">
               <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Password">
         </div>
         <div class="input-group form-group">
            <div class="input-group-prepend">
               <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
            </div>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Password Confirmation">
         </div>
         <div class="form-group">
            <input type="submit" value="Register" class="btn float-right login_btn">
         </div>
      </form>
   </div>
</div>
@endsection
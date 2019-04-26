@extends('layouts.admin')
@section('content')
<div class="container">
   <h1>Create Users</h1>
   @include('includes.form-error')
   @include('includes.tinyeditor')
   <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
         <form action="{{ route('user.store') }}" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div>
               <label for="name">Name:</label>
               <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" value="{{ old('name') }}">
            </div>
            <div>
               <label for="email">Email:</label>
               <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
            </div>
            <div>
               <label for="password">Password:</label>
               <input type="password" id="password" name="password" class="form-control" value="{{ old('password') }}">
            </div>
            <div>
               <label for="password">Confirm_password:</label>
               <input type="password" id="confirm_password" name="confirm_password" class="form-control" value=" ">
            </div>
            <div class="form-group">
               <input type="submit" class="btn btn-success" value="Create User" />
            </div>
         </form>
      </div>
      <div class="col-md-2"></div>
   </div>
</div>
@stop
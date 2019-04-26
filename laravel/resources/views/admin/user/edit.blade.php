@extends('layouts.admin')
@section('content')
<div class="container">
   <h1>Edit User</h1>
   @include('includes.form-error')
   @include('includes.tinyeditor')
   <div class="row">
      <div class="col-md-12">
         <form action="{{ route('user.update',$user->id) }}" method="POST" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="PUT">
            <div>
               <label for="name">Name:</label>
               <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" value="{{ $user->name }}">
            </div>
            <div>
               <label for="email">Email:</label>
               <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email" value="{{ $user->email }}" disabled>
            </div>
            <div class="form-group">
               <input type="submit" class="btn btn-success" value="Edit User" />
               <p><a href="{{ route('user.index') }}" class="btn btn-primary back">Back</a></p>
            </div>
            <input type="hidden" id="password" name="password" class="form-control" value="{{ $user->password }}" >
         </form>
      </div>
   </div>
</div>
@stop
@extends('layouts.admin')

@section('content')
@include('includes.success-message')
<h1>Users Information</h1>
<div class="col-sm-12">
<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Create</th>
            <th>Update</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
            <td>
            <a href="{{ route('user.edit', $user->id) }}"><input type="submit" class="btn btn-primary edit" value="Edit" ></a>
                <form class="delete" action="{{route('user.destroy',$user->id)}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <div class="form-group">
                        <input type="submit" class="btn btn-danger" value="Delete" />
                    </div>
                 </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>


   <div class="row">
        <div class="col-lg-6 col-sm-offset-5">
            {{ $users->render() }}
        </div>
        
    </div>
@stop
@extends('layouts.admin')
@section('content')
<div class="container">
<h1>Create Category</h1>
@include('includes.form-error')
@include('includes.tinyeditor')
    <div class="row">
    <div class="col-md-12">
        <form action="{{ route('category.store') }}" method="post" enctype='multipart/form-data'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div >
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter title" value="{{ old('title') }}">
            </div>        
            <div >
                    <label for="icon">Icon:</label>
                    <input type="text" id="icon" name="icon" class="form-control" placeholder="Enter icon" value="{{ old('icon') }}">
            </div> 
            <a href="https://fontawesome.com/">Click here to know more about font awesome</a>
           <div >
                    <label for="content">Content:</label>
                     <textarea class="form-control" rows="5" id="content" name="content">{{ old('content') }}</textarea>
            </div> 
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Create Category" />
            </div>
        </form>
        </div>
    </div>

</div>


@stop
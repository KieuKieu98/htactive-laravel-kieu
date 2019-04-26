@extends('layouts.admin')
@section('content')
<div class="container">
<h1>Edit Category</h1>
@include('includes.form-error')
@include('includes.tinyeditor')
<div class="row">
    <div class="col-md-12">
    <form action="{{ route('category.update',$category->id) }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <input type="hidden" name="_method" value="PUT">

        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Enter category name" value="{{ $category->title }}">
        
        </div>     
        <div >
            <label for="icon">Icon:</label>
            <input type="text" id="icon" name="icon" class="form-control" placeholder="Enter category icon" value="{{ $category->icon }}">
      
        </div>    
        <a href="https://fontawesome.com/">Click here to know more about font awesome</a>
        <div>
            <label for="content">Content:</label>
            <textarea class="form-control" rows="5" id="content" name="content">{{ $category->content }}</textarea>
   
        </div> 

        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Edit Category" />
            <p><a href="{{ route('category.index') }}" class="btn btn-primary back">Back</a></p>
        </div>
    </form>
    </div>
</div>



</div>




@stop
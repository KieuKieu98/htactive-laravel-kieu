@extends('layouts.admin')
@section('content')

<div class="wrapper">
        <div class="container">
        <div class="read">
            <div class="row">
            <div class="col-md-6">
                <div class="form-group" >
                <img src="{{asset($blog->image)}}" id="image" style="height:500px" alt="" class="img-responsive img-rounded">
                </div>
            </div>
                <div class="col-md-6">
                    <div class="form-group">
                        
                        <h3 class="form-control-static">{{ $blog->title }}</h3>
                    </div>
                    <div class="form-group">
                        <p class="form-control-static">
                        Author:<i> {{$blog->user->name}}</i>
                        </p>
                    </div>
                    <div class="form-group">
                        <p class="form-control-static">{!! $blog->content !!}</p>
                    </div>
                    <p><a href="{{ URL::previous() }}" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</div>
    @stop
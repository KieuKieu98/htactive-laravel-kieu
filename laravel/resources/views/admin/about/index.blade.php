@extends('layouts.admin')
@section('content')
@include('includes.success-message')
    <h1>Abouts Information</h1>
    <div class="col-sm-12">
            @if($abouts)   
            <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Icon</th>
                    <th>Content</th>
                    <th>Created date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

            @foreach($abouts as $about)
                    <tr>
                        <td>{{$about->id}}</td>
                        <td>{{$about->title}}</td>
                        <td><span class="{{$about->icon}} icons"> </span> </td>
                        <td>{!!str_limit($about->content, 100)!!}</td>
                        <td>{{$about->date_time_format}}</td>
                        <td><a href="{{ route('about.edit', $about->id) }}"><input type="submit" class="btn btn-primary edit" value="Edit" ></a>
                        <form class="delete" action="{{route('about.destroy',$about->id)}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                        <input type="submit" class="btn btn-danger" value="Delete">
                        <!-- <span class='glyphicon glyphicon-trash'> -->
                        </input>
                        </div>
                        </form>
                        </td>
                    </tr>
                @endforeach     

                </tbody>
            </table>

         @endif

       

    </div>


   <div class="row">
        <div class="col-lg-6 col-sm-offset-5">
            {{ $abouts->render() }}
        </div>
        
    </div>

@stop
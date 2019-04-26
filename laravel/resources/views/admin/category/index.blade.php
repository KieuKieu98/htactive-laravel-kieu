@extends('layouts.admin')

@section('content')
@include('includes.success-message')
    <h1>Categories Information</h1>
    <div class="col-sm-12">
            @if($categories)    
            <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Icon</th>
                    <th>Content</th>
                    <th>Created date</th>
                    <th> Action</th>
                </tr>
                </thead>
                <tbody>

            @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td><span class="{{$category->icon}} icons"> </span> </td>
                        <td>{!!str_limit($category->content, 30)!!}</td>
                        <td>{{$category->created_at}}</td>
                        <td><a href="{{ route('category.edit', $category->id) }}"><input type="submit" class="btn btn-primary edit" value="Edit" ></a>
                        <form class="delete" action="{{route('category.destroy',$category->id)}}" method="POST">
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
            {{ $categories->render() }}
        </div>
        
    </div>


@stop
@extends('layouts.admin')
@section('content')
@include('includes.success-message')
<h1>Portfolio Information</h1>
<table class="table table-hover">
   <thead class="thead-dark">
      <tr>
         <th>Id</th>
         <th>Title</th>
         <th>Category</th>
         <th>Content</th>
         <th>Image</th>
         <th>View Portfolio</th>
         <th>Created at</th>
         <th>Update</th>
         <th> Action</th>
   </thead>
   <tbody>
      @if($portfolios)
      @foreach($portfolios as $portfolio)
      <tr id="tr_{{$portfolio->id}}">
         <td>{{$portfolio->id}}</td>
         <td>{{$portfolio->title}}</td>
         <td>{{$portfolio->category ? $portfolio->category->title : 'Uncategorized'}}</td>
         <td>{!!str_limit($portfolio->content, 30)!!}</td>
         <td><img height="50" src="{{asset($portfolio->image)}}" alt=""></td>
         <td><a href="{{route('portfolio.show', $portfolio->id) }}">View portfolio</a></td>
         <td>{{$portfolio->created_at}}</td>
         <td>{{$portfolio->updated_at}}</td>
         <td>
            <a href="{{ route('portfolio.edit', $portfolio->id) }}"><input type="submit" class="btn btn-primary edit" value="Edit" ></a>
            <form class="delete" action="{{route('portfolio.destroy',$portfolio->id)}}" method="POST">
               <input type="hidden" name="_method" value="DELETE">
               <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
               <div class="form-group">
                  <input type="submit"class="btn btn-danger" value="Delete">
                  <!-- <span class='glyphicon glyphicon-trash'> -->
                  </input>
               </div>
            </form>
         </td>
      </tr>
      @endforeach
      @endif
   </tbody>
</table>
<div class="row">
   <div class="col-lg-6 col-sm-offset-5">
      {{ $portfolios->render() }}
   </div>
</div>
@stop
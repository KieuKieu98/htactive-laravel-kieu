@if($data)
@foreach($data as $service)
<tr id="tr_{{$service->id}}">
   <td><input type="checkbox" class="sub_chk" data-id="{{$service->id}}"></td>
   <td>{{$service->id}}</td>
   <td>{{$service->title}}</td>
   <td>{{$service->category ? $service->category->title : 'Uncategorized'}}</td>
   <td>{!!str_limit($service->content, 30)!!}</td>
   <td><img height="50" src="{{asset($service->image)}}" alt=""></td>
   <td><a href="{{ route('service.show', $service->id) }}">View Service</a></td>
   <td>{{$service->created_at}}</td>
   <td>{{$service->updated_at}}</td>
   <td>
      <a href="{{ route('service.edit', $service->id) }}"><input type="submit" class="btn btn-primary edit" value="Edit" ></a>
      <form class="delete" action="{{route('service.destroy',$service->id)}}" method="POST">
         <input type="hidden" name="_method" value="DELETE">
         <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
         <div class="form-group">
            <input type="submit" class="btn btn-danger" value="Delete">
            </input>
         </div>
      </form>
   </td>
</tr>
@endforeach
<tr>
   <td colspan="9" align="center" style="border:none;">
      {!! $data->links() !!}
   </td>
</tr>
<script>
      $(".delete").on("submit", function(){
          return confirm("Are you sure?");
      });
</script>
@endif
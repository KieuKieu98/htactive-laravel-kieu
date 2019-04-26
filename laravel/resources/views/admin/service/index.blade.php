@extends('layouts.admin')
@section('content')
@include('includes.success-message')
<h1>Services Information</h1>
<div class="row">
   <div class="col-md-9">
   </div>
   <div class="col-md-3">
      <div class="form-group">
         <input type="text" name="serach" id="serach" class="form-control"placeholder="Search..." />
      </div>
   </div>
</div>
<button style="margin-bottom:10px" class="btn btn-info delete_all" data-url="{{ url('/admin/myproductsDeleteAll') }}">Delete All Selected</button>
<table class="table table-hover">
   <thead class="thead-dark">
      <tr>
         <th width="50px"><input type="checkbox" id="master"></th>
         <th>Id</th>
         <th>Title</th>
         <th>Category</th>
         <th>Content</th>
         <th>Image</th>
         <th>View Service</th>
         <th>Created at</th>
         <th>Update</th>
         <th> Action</th>
   </thead>
   <tbody>
      @include('admin.service.pagination_data')
   </tbody>
</table>
<input type="hidden" name="hidden_page" id="hidden_page" value="1" />
<input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
<input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
<script type="text/javascript">
   $(document).ready(function () {
   
   
       $('#master').on('click', function(e) {
        if($(this).is(':checked',true))  
        {
           $(".sub_chk").prop('checked', true);  
        } else {  
           $(".sub_chk").prop('checked',false);  
        }  
       });
   
   
       $('.delete_all').on('click', function(e) {
   
   
           var allVals = [];  
           $(".sub_chk:checked").each(function() {  
               allVals.push($(this).attr('data-id'));
           });  
           if(allVals.length <=0)  
           {  
               alert("Please select row.");  
           }  else {  
   
               var check = confirm("Are you sure you want to delete this row?");  
               if(check == true){  
                   var join_selected_values = allVals.join(","); 
   
                   $.ajax({
                       url: $(this).data('url'),
                       type: 'DELETE',
                       headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                       data: 'ids='+join_selected_values,
                       success: function (data) {
                           if (data['success']) {
                               $(".sub_chk:checked").each(function() {  
                                   $(this).parents("tr").remove();
                               });
                               alert(data['success']);
                           } else if (data['error']) {
                               alert(data['error']);
                           } else {
                               alert('Whoops Something went wrong!!');
                           }
                       },
                       error: function (data) {
                           console.log(data);
                       }
                   });
   
   
                 $.each(allVals, function( index, value ) {
                     $('table tr').filter("[data-row-id='" + value + "']").remove();
                 });
               }  
           }  
       });
   });
</script>
<script>
   $(document).ready(function(){
   
    function fetch_data(page, sort_type, sort_by, query)
    {
     $.ajax({
      url:"/admin/pagination/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
      success:function(data)
      {
       $('tbody').html('');
       $('tbody').html(data);
      }
     })
    }
   
    $(document).on('keyup', '#serach', function(){
       var query = $('#serach').val();
       var column_name = $('#hidden_column_name').val();
       var sort_type = $('#hidden_sort_type').val();
       var page = $('#hidden_page').val();
       fetch_data(page, sort_type, column_name, query);
    });
   
    $(document).on('click', '.pagination a', function(event){
     event.preventDefault();
     var page = $(this).attr('href').split('page=')[1];
     $('#hidden_page').val(page);
     var column_name = $('#hidden_column_name').val();
     var sort_type = $('#hidden_sort_type').val();
   
     var query = $('#serach').val();
   
     $('li').removeClass('active');
           $(this).parent().addClass('active');
     fetch_data(page, sort_type, column_name, query);
    });
   
   });
</script>

@stop
 @extends('layouts.admin') @section('content')

<div class="container">
	<h1>Edit Blog</h1>
	@include('includes.form-error') @include('includes.tinyeditor')
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('blog.update',$blog->id) }}" method="post" enctype='multipart/form-data'>
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
				<input type="hidden" name="_method" value="PUT">
				<div>
					<label for="title">Title:</label>
					<input type="text" id="title" name="title" class="form-control" placeholder="Enter title" value="{{ $blog->title }}">

				</div>
				<div class="form-group" id="imagePreview">
					<img src="{{asset($blog->image)}}" id="image" alt="" class="img-responsive img-rounded">
				</div> <br>

				<div class="upload-img">
					<label for="image">Image Upload:</label>
					<input type="file" id="uploadFile" name="image" class="form-control" value="{{ old('image') }}">
				</div>

				<div>
					<label for="content">Content:</label>
					<textarea class="form-control" rows="5" id="content" name="content">{{ $blog->content }}</textarea>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-success" value="Edit Post" />
					<p><a href="{{ route('blog.index') }}" class="btn btn-primary back">Back</a></p>
				</div>
			</form>
		</div>


	</div>

</div>

@stop
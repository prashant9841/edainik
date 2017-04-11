{{ csrf_field() }}
<div class="row">
	<div class="input-field col s12 m6">

		<input id="title" type="text" name="title" class="validate materialize-textarea"
			@if(isset($post))
				value="{{ $post->title }}"
			@endif

		>

		<label for="title" >Title</label>

		@if($errors->has('title'))
			<p class="errors">{{ $errors->get('title')[0] }}</p>
		@endif
	</div>
	<div class="input-field col s12 m6">
	    <select name="category_id">
		  	<option value="" disabled 
		  	@if(isset($post) && $post->category_id == null)
		  		selected
		  	@endif
		  	>Choose your option</option>

			
			  @foreach($categories as $category)
			      <option value="{{ $category->id }}"
					@if(isset($post) && $post->category_id == $category->id)
					selected
					@endif
			      >{{ $category->title }}</option>
			  @endforeach

		</select>
	    <label>Choose a category</label>
  	</div>
</div>
<div class="row">
	<div class="input-field col s12">
		<textarea id="description" name="description" class="materialize-textarea">@if(isset($post)){{ $post->description }}@endif</textarea>
		<label for="description">Description</label>

		@if($errors->has('description'))
			<p class="errors">{{ $errors->get('description')[0] }}</p>
		@endif

	</div>
</div>

<div class="row">
	<div class="input-field col s12">
		<textarea id="textarea" name="content" class="materialize-textarea">@if(isset($post)){{ $post->content }}@endif</textarea>
		<label for="textarea">Content</label>
		@if($errors->has('content'))
			<p class="errors">{{ $errors->get('content')[0] }}</p>
		@endif
	</div>
</div>


<div class="row">
	<div class="input-field col s12">
		<div class="file-field input-field">
	      <div class="btn">
	        <span><i class="material-icons">add_a_photo</i></span>
	        <input type="file" name="image">
	      </div>
	      <div class="file-path-wrapper">
	        <input class="file-path validate" type="text" placeholder="Upload Image">
	      </div>
	    </div>
		{{-- <input type="file" name="image"> --}}
	</div>
	@if(isset($post))
		@foreach($post->getMedia('images') as $image)
		<div class="col m4 s6 l4">
			<div class="card">
				<div class="card-image">
					<img src="{{$image->getUrl()}}">
					<div class="card-title row">
						<h5 class="left">
							Image
						</h5>
						<div class="right">							
							<a class="btn red" href="{{ url('/dashboard/medias/remove/'.$post->id.'/'.$image->id)}}"><i class="material-icons">delete</i></a>
						</div>
					</div>
				</div>		
			</div>
		</div>
		@endforeach
	@endif
</div>


<p>
	<input type="checkbox" class="" id="filled-in-box" @if(isset($post)) {{ ($post->status) ?'checked': null }} @endif name="status" />
	<label for="filled-in-box">Publish</label>
</p>


@section('bottom-scripts')
<script>
	$(document).ready(function() {
		$('select').material_select();
	});
</script>
@stop

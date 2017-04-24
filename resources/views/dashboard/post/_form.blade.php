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
<div class="input-field col s12 m6">

		<input id="slug" type="text" name="slug" class="validate materialize-textarea"
			@if(isset($post))
				value="{{ $post->slug }}"
			@endif

		>

		<label for="slug" >Slug</label>

		@if($errors->has('slug'))
			<p class="errors">{{ $errors->get('slug')[0] }}</p>
		@endif
</div>
<div class="input-field col s12 m12">

		<input id="callout" type="text" name="callout" class="validate materialize-textarea"
			@if(isset($post))
				value="{{ $post->callout }}"
			@endif

		>

		<label for="callout" >Callout</label>

		@if($errors->has('callout'))
			<p class="errors">{{ $errors->get('callout')[0] }}</p>
		@endif
</div>
<div class="input-field col s12 m12">

		<input id="address" type="text" name="address" class="validate materialize-textarea"
			@if(isset($post))
				value="{{ $post->address }}"
			@endif

		>

		<label for="address" >Address: (Posted From)</label>

		@if($errors->has('address'))
			<p class="errors">{{ $errors->get('address')[0] }}</p>
		@endif
</div>
<div class="input-field col s12 m12">

		<input id="subtitle" type="text" name="subtitle" class="validate materialize-textarea"
			@if(isset($post))
				value="{{ $post->subtitle }}"
			@endif

		>

		<label for="subtitle" >Subtitle:</label>

		@if($errors->has('subtitle'))
			<p class="errors">{{ $errors->get('subtitle')[0] }}</p>
		@endif
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
	        <input type="file" name="image[]" multiple="true">
	      </div>
	      <div class="file-path-wrapper">
	        <input class="file-path validate" type="text" placeholder="Upload Image">
	      </div>
	      @if($errors->has('image'))
			<p class="errors">{{ $errors->get('image')[0] }}</p>
		@endif
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
							<a class="btn red {{ ($loop->first)? 'disabled':null }}"  href="/dashboard/medias/set-featured/{{$post->id}}/{{$image->id}}"><i class="material-icons">star</i></a>
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

{{ csrf_field() }}
<div class="row">
	<div class="input-field col s6">

		<input id="title" type="text" name="title" class="validate materialize-textarea"
			@if(isset($post))
				value="{{ $post->title }}"
			@endif

		>

		<label for="title">Title</label>
	</div>
</div>
<div class="row">
	<div class="input-field col s12">
		<textarea id="textarea" name="content" class="materialize-textarea">@if(isset($post)){{ $post->content }}@endif</textarea>
		<label for="textarea">Content</label>
	</div>
</div>
<div class="row">
	<div class="input-field col s12">
		<textarea id="description" name="description" class="materialize-textarea">@if(isset($post)){{ $post->description }}@endif</textarea>
		<label for="description">Description</label>
	</div>
</div>

<div class="row">
	<div class="input-field col s12">
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

<p>
	<input type="checkbox" class="filled-in" id="filled-in-box" @if(isset($post)) {{ ($post->status) ?'checked': null }} @endif name="status" />
	<label for="filled-in-box">Publish</label>
</p>

<div class="row">
	<div class="input-field col s12">
		<input type="file" name="image">
	</div>
	@if(isset($post))
		@foreach($post->getMedia('images') as $image)
		<div class="card col m4 s6 l4">
			<div class="card-image">
				<img src="{{$image->getUrl()}}">
				<span class="card-title">Card Title</span>
			</div>
			<div class="card-action">
				<a href="{{ url('/dashboard/medias/remove/'.$post->id.'/'.$image->id)}}">Remove</a>
			</div>
		</div>
		@endforeach
	@endif
</div>


@section('bottom-scripts')
<script>
	$(document).ready(function() {
    $('select').material_select();
  });
</script>
@stop

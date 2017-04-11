{{ csrf_field() }}

<div class="row">
	<div class="input-field col s6">
		<input id="title" type="text" name="title" class="validate" 

		@if(isset($category))
			value="{{ $category->title }}"
		@endif

		>
		<label for="title">Title</label>
		@if($errors->has('title'))
			<p class="errors">{{ $errors->get('title')[0] }}</p>
		@endif
	</div>
</div>
<div class="row">
	<div class="input-field col s12">
		<input id="slug" type="text" name="slug" class="validate"
			@if(isset($category))
				value="{{ $category->slug }}"
			@endif
		>
		<label for="slug">Slug</label>

		@if($errors->has('slug'))
			<p class="errors">{{ $errors->get('slug')[0] }}</p>
		@endif
	</div>
</div>

<p>
	<input type="checkbox" class="filled-in" id="filled-in-box" @if(isset($category)) {{ ($category->status) ?'checked': null }} @endif name="status" />
	<label for="filled-in-box">Publish</label>
</p>


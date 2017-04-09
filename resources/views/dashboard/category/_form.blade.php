{{ csrf_field() }}
<div class="row">
	<div class="input-field col s6">
		<input placeholder="Title" id="title" type="text" name="title" class="validate" 

		@if(isset($category))
			value="{{ $category->title }}"
		@endif

		>
		<label for="title">Title</label>
	</div>
</div>
<div class="row">
	<div class="input-field col s12">
		<input placeholder="Slug" id="slug" type="text" name="slug" class="validate"
			@if(isset($category))
				value="{{ $category->slug }}"
			@endif
		>
		<label for="slug">Slug</label>
	</div>
</div>


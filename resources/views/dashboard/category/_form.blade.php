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
		>
		<label for="slug">Slug: {{ ($category->slug) ?? null }}</label>

		@if($errors->has('slug'))
			<p class="errors">{{ $errors->get('slug')[0] }}</p>
		@endif
	</div>
</div>

<div class="row">
	<div class="input-field col s12">
		<input id="header_color" type="text" name="header_color" class="validate"
		@if(isset($category))
			value="{{ $category->header_color }}"
		@endif
		>
		<label for="header_color">Header Color:</label>

		@if($errors->has('header_color'))
			<p class="errors">{{ $errors->get('header_color')[0] }}</p>
		@endif
	</div>
</div>
<div class="row">
	<div class="input-field col s12">
		<input id="icon" type="text" name="icon" class="validate"
		@if(isset($category))
			value="{{ $category->icon }}"
		@endif
		>
		<label for="icon">Icon:</label>

		@if($errors->has('icon'))
			<p class="errors">{{ $errors->get('icon')[0] }}</p>
		@endif
	</div>
</div>
<div class="row">
	<div class="input-field col s12 m6">
		<p>
			<input type="checkbox" class="filled-in" id="on_homepage" @if(isset($category)) {{ ($category->on_homepage) ?'checked': null }} @endif name="on_homepage" />
			<label for="on_homepage">Show on homepage</label>
		</p>
		
	</div>
	<div class="input-field col s12 m6">
		<p>
			<input type="checkbox" class="filled-in" id="on_sidebar" @if(isset($category)) {{ ($category->on_sidebar) ?'checked': null }} @endif name="on_sidebar" />
			<label for="on_sidebar">Show on sidebar(homepage)</label>
		</p>
		
	</div>
</div>
<div class="row">
	<div class="input-field col s12 m12">
		<p>
			<input type="checkbox" class="filled-in" id="filled-in-box" @if(isset($category)) {{ ($category->status) ?'checked': null }} @endif name="status" />
			<label for="filled-in-box">Publish</label>
		</p>
		
	</div>
</div>


@if(isset($media))
		
	<div class="card col m4 s6 l4">
		<div class="card-image">
			<img src="{{$media->getUrl()}}">
			<span class="card-title">{{ ucfirst($media->name) }}</span>
		</div>
		<div class="card-action">

			<p>Product : {{ $media->model_type::find($media->model_id)->title }}</p>

			<p>Collection: {{ $media->collection_name }}</p>
			<p>Name: {{ $media->name }}</p>
			<p>FileName: {{ $media->file_name }}</p>
			<p>MimeType: {{ $media->mime_type }}</p>
			<p>Disk: {{ $media->disk }}</p>
			<p>Size: {{ Spatie\MediaLibrary\Helpers\File::getHumanReadableSize($media->size) }}</p>

			<p>Order: {{ $media->order_column }}</p>

			<a href="{{ url('/dashboard/medias/remove/'.$media->id)}}">Remove</a>
		</div>
	</div>
	
@endif

{{ csrf_field() }}
<div class="row">
	<div class="input-field col s6">

		<input id="name" type="text" name="name" class="validate materialize-textarea"
			@if(isset($media))
				value="{{ $media->name }}"
			@endif

		>

		<label for="name">Name</label>
	</div>
</div>
{{--
//Select a product
<div class="row">
	<div class="input-field col s6">

		<input id="name" type="text" name="name" class="validate materialize-textarea"
			@if(isset($media))
				value="{{ $media->name }}"
			@endif

		>

		<label for="name">Name</label>
	</div>
</div>

--}}

<div class="row">
	<div class="input-field col s6">

		<input id="file_name" type="text" name="file_name" class="validate materialize-textarea"
			@if(isset($media))
				value="{{ $media->file_name }}"
			@endif

		>

		<label for="file_name">File Name</label>
	</div>
</div>
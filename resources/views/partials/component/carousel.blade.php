<div class="carousel carousel-slider">
	@foreach($slider as $image)
    	<a class="carousel-item" href="#one!"><img src="{{ $image->getUrl() }}"></a>
    @endforeach
</div>
        
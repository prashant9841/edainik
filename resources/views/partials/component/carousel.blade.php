<div class="carousel carousel-slider" style="height: 400px;">
	@foreach($slider as $image)
    	<a class="carousel-item" href="#"><img src="{{ asset($image->getUrl()) }}"></a>
    @endforeach
</div>
        
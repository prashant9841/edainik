<div class="large-post">        
	<div class="parallax-container">
	<div class="section">
		<div class="container">
			<h1 class="header center">{{$post->title}}</h1>
			 @if($post->category)
                <p>{{ $post->category->title }} </p>
            @endif
		</div>
	</div>
	<div class="parallax"><img src="{{ $post->getFirstImageUrl() }}" alt="Unsplashed background img 1"></div>
	</div>

	<div class="content container">
		<div class="row center">
			<p class="wrap">{{ $post->description }}</p>
		</div>
		<div class="row center btn-row">
			<a href="{{ url('/news/'.$post->slug) }}" class="btn waves-effect waves-light">Read More</a>
		</div>
	</div>
	<div class="ads container">
		{!! Ads::show('responsive') !!}
	</div>

</div>
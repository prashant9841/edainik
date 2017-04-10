<div class="flash-news">
	<div id="flash-news" class="container">
			@foreach($latestNews as $news)
		<div class="">			
		        	           
	            <p><a href="{{ url('posts',$news->slug)}}">{{ $news->title }}</a></p>
		                
		</div>
		    @endforeach
	</div>
</div>
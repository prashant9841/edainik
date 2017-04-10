<div class="flash-news">
	<div id="flash-news" class="container">
			@foreach($latestNews as $news)
		<div class="">			
		        	           
	            <p>{{ $news->title }}</p>
		                
		</div>
		    @endforeach
	</div>
</div>
@if($latestNews->count())
	<ul class="row tiny-post latest">
	    @foreach($latestNews as $news)
	        <li>
	            <a href="{{ url('news',$news->slug)}}">
	                
	                        <h4>{{ $news->title }}</h4>
	                    
	            </a>

	        </li>
	    @endforeach
	</ul>
@else
	<div class="card">
		@lang('homepage.no-item-found')
	</div>
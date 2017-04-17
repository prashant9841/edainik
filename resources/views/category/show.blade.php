@extends('layouts.app')

@section('title')
    {{$category->title}} | 
@stop

@section('meta-description')
    News for category {{$category->slug}}
@stop

@section('meta-keyword')
@stop

@section('content')

	<div class="row">
		<section class="featured-post">
			@foreach($category->approvedPosts as $post)
		      @include('partials.category._postCard')
			@endforeach
		</section>
    @if(isset($related))
    <section class="related container">
        <h3>@lang('homepage.related')</h3>
        <div class="row">
            <div class="col s12 m9">
                <ul class="row small-post latest">
                    @foreach($related as $news)
                        <li class="col s12 m6">
                            <div class="card" 
                            {{-- style="background: url('{{$news->getFirstImageUrl()}}')  --}}
                            ">
                                <a href="{{ url('news',$news->slug)}}">
                                    <div class="card-content">
                                        <h4>{{ $news->title }}</h4>
                                        <div class="row small">
                                            <div class="col s6">
                                                <p><i class="ti-time"></i> &nbsp;{{$news->created_at->diffForHumans()}}</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </a>
                            </div>

                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col s12 m3 side-post">
                <div class="card">
                    {!! Ads::show('responsive') !!}
                </div>
                <div class="card">
                    <div class="card-content">
                        <h4>@lang('homepage.latest')</h4>
                        <ul class="collection">
                            @foreach($related as $post)
                               <a class="collection-item" href="{{ url('news',$post->slug)}}">{{ $post->title }}</a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="card">
                    {!! Ads::show('responsive') !!}
                </div>
            </div>
        </div>
    </section>
    @endif
	</div>

@stop
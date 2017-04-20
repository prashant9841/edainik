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
    <div class="cat-page">
        <section class="container">
            <div class="row section-title">
                <div class="col s12 l6 {{$category->header_color}}">
                    <h4>{{$category->title}}</h4>

                    <img src="
                    @if(strlen($category->icon) >4)
                        {{asset('/images/icons/'.$category->icon)}}
                    @else
                        {{asset('/images/icons/news.png')}}
                    @endif
                    " alt="{{$category->title}}">
                    <div class="skwed"></div>
                </div>
                <div class="col s12 l6">
                    {!! Ads::show('responsive') !!}
                </div>
            </div>
        </section>

    	<div class="row">
    		<section class="featured-post">
    			@foreach($category->approvedPosts as $post)
    		      @include('partials.category._postCard')
    			@endforeach
    		</section>
            
        @if(isset($related))
        <section class="related container">
            
            <div class="row">
                <div class="col s12 m9">
                    <ul class="row small-post with-image latest">
                        @foreach($related as $news)
                            <li class="col s12 m6">
                                <a href="{{ url('news',$news->slug)}}">
                                    <div class="card group">
                                        <div class="card-image">
                                            <img src="{{ $news->getFirstImageUrl('thumb') }}" alt="">
                                        </div>
                                        <div class="card-content">
                                            <h4>{{ $news->title }}</h4>
                                            <div class="row small">
                                                <div class="col s6">
                                                    <p><i class="fa fa-clock-o"></i>&nbsp;{{$news->created_at->diffForHumans()}}</p>
                                                </div>
                                                <div class="col s6">
                                                    <p><i class="fa fa-bars"></i>&nbsp; {{ $news->category->title }}</p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </a>

                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col s12 m3 side-post">
                   @include('partials.post._relatedPost')
                </div>
            </div>
        </section>
        @endif
	</div>

@stop
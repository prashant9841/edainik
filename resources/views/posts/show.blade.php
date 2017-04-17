@extends('layouts.app')

@section('title')
    {{$post->title}} | 
@stop

@section('meta-description')
    {{$post->description}}
@stop

@section('meta-keyword')
@stop

@section('content')
<div class="page-single-news">
    
	<section class="featured-post">
        <div class="large-post">        
            <div class="section">
                <div class="container">
                    <h1 class="header center">{{$post->title}}</h1>
                </div>
            </div>
            <div class="parallax-container">
                <div class="section">
                    @if(Auth::check() && Auth::user()->id == $post->user_id)
                        <a class="btn" href="{{ url('/dashboard/posts/'.$post->id.'/edit')}}"><i class="ti-pencil"></i></a>
                    @endif
                    @if($post->category)
                        <p>{{ $post->category->title }} </p>
                    @endif
                    <div class="row share center"> </div>
                                        
                </div>
                <div class="parallax"><img src="{{ $post->getFirstImageUrl() }}" alt="Unsplashed background img 1"></div>
            </div>

            <div class="content container">
                {{-- <div class="callout">           
                    <div class="callout-content z-depth-3">
                        <p><span>"</span>{{$post->description}} <span>"</span></p>
                    </div>
                </div> --}}
                <div class="row center">                    
                    <p class="wrap">{!! $post->content !!}</p>
                </div>
            </div>
            <div class="ads container">
                {!! Ads::show('responsive') !!}
            </div>
        </div>
    </section>

    <section class="related container">
        <h3>सम्बन्धित खबर</h3>
        <div class="row">
            <div class="col s12 m9">
                <ul>
                </ul>
            </div>
            <div class="col s12 m3">
            </div>
        </div>
    </section>

</div>
                    @include('partials.post._latestPost')
                @include('partials.post._relatedPost')

@stop


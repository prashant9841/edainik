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
        <div class="row section-title">
            <div class="col s12 m6">
                <h4>@lang('homepage.related')</h4>
                <i class="ti-user"></i>
                <div class="skwed"></div>
            </div>
            <div class="col s12 m6">
                {!! Ads::show('responsive') !!}
            </div>
        </div>
        <div class="row">
            <div class="col s12 m9">
                <ul class="row small-post latest">
                    @include('partials.post._latestPost')
                </ul>
            </div>
            <div class="col s12 m3 side-post">
                @include('partials.post._relatedPost')
            </div>
        </div>
    </section>

</div>

@stop


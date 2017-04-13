@extends('layouts.app')

@section('content')
<div class="page-single-news">
    
	<section class="featured-post">
        <div class="large-post">        
            <div class="parallax-container">
                <div class="section">
                    <div class="container">
                        @if(Auth::user()->id == $post->user_id)
                            <a class="btn" href="{{ url('/dashboard/posts/'.$post->id.'/edit')}}"><i class="material-icons">create</i></a>
                        @endif
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
                    <div class="row share center"> </div>
                    <p class="wrap">{!! $post->content !!}</p>
                </div>

            </div>
            <div class="ads container">
             {!! Ads::show('responsive') !!}
            </div>
        </div>
    </section>

    <section class="related container">
        <h3>Related Posts</h3>
        <div class="row">
            <div class="col s12 m9">
                <ul>
                    @include('partials.post._latestPost')
                </ul>
            </div>
            <div class="col s12 m3">
                @include('partials.post._relatedPost')
            </div>
        </div>
    </section>

</div>

@stop


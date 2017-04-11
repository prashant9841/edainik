@extends('layouts.app')

@section('content')
    
    @include('layouts._flashNews')

    <section class="featured-post">
        @foreach ($posts as $post)
            @include('partials.home._post')
        @endforeach
    </section>

    <section class="related container">
        <h3>Recent News</h3>
        <div class="row">
            <div class="col s12 m9">
               @include('partials.home._latestPost')
            </div>
            <div class="col s12 m3">
                @include('partials.home._relatedPost')
            </div>
        </div>
    </section>
@stop
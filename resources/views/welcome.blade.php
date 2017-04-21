@extends('layouts.app')

@section('title')
    Home
@stop

@section('meta-description')

@stop

@section('meta-keyword')
@stop

@section('links')
    <link rel="stylesheet" href="/stylesheets/social.css">
@stop
@section('content')
    
    <section class="featured-post">
        @foreach ($posts as $post)
            @include('partials.home._post')
        @endforeach
    </section>

    <section class="related container">
        <div class="row">
            <div class="col s12 m9">

                <div class="row section-title">
                    <div class="col s12 l6">
                        <h4>@lang('homepage.latest-news')</h4>
                        <img src="{{asset('/images/icons/latest.png')}}" alt="">
                        <div class="skwed"></div>
                    </div>
                    <div class="col s12 l6">
                        {!! Ads::show('responsive') !!}
                    </div>
                </div>
                @include('partials.home._latestPost')


                <div class="row section-title">
                    <div class="col s12 l6">
                        <h4> @lang('homepage.trending-news')</h4>
                        <img src="{{asset('/images/icons/trending.png')}}" alt="">
                        <div class="skwed"></div>
                    </div>
                    <div class="col s12 l6">
                        {!! Ads::show('responsive') !!}
                    </div>
                </div>

               @include('partials.home._trendingPost')
            </div>

            <div class="col s12 m3 side-post">
                @component('partials.component.sideList',['background' => $category->header_color ?? null ])
                    @slot('title')
                        @lang('homepage.category-list')
                    @endslot
                   
                    @include('partials.component.collectionItems',['route' => 'singleCategory','items' => $categoriesList])
                @endcomponent


                <div class="card"> 
                    <div class="slide-news">
                        @foreach ($posts as $post)
                            <div>
                                <div class="card-image">
                                    <img src="{{ $post->getFirstImageUrl() }}" alt="{{ $post->title }}">
                                </div>
                                <div class="card-content">                                   
                                    <a href="{{ route('singleNews',$post->slug) }}" >                                        
                                        {{$post->title}}
                                    </a>   
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="card">
                    <div class="fb-page" data-href="https://www.facebook.com/eDainikpost/" data-tabs="timeline" data-height="450px" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/eDainikpost/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/eDainikpost/">Adventure Nepal</a></blockquote></div>
                </div>


            </div>
        </div>
    </section>

{{--     <section class="related container">
        <div class="row section-title">
            <div class="col s12 l6">
                <h4> @lang('homepage.trending-news')</h4>
                <img src="{{asset('/images/icons/trending.png')}}" alt="">
                <div class="skwed"></div>
            </div>
            <div class="col s12 l6">
                {!! Ads::show('responsive') !!}
            </div>
        </div>
        <div class="row">
            <div class="col s12 m9">
               @include('partials.home._trendingPost')
            </div>

            <div class="col s12 m3 side-post">


                <div class="card">
                    <div class="fb-page" data-href="https://www.facebook.com/eDainikpost/" data-tabs="timeline" data-height="450px" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/eDainikpost/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/eDainikpost/">Adventure Nepal</a></blockquote></div>
                </div>

                <div class="card">
                    <div class="slide-news">
                        @foreach ($trendingNews as $post)
                            <div>
                                <div class="card-image">
                                    <img src="{{ $post->getFirstImageUrl('thumb') }}" alt="{{$post->title}}">
                                </div>
                                <div class="card-content">                                   
                                    <a href="{{ route('singleNews',$post->slug) }}" >
                                        {{$post->title}}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
 --}}
    {{-- 3 Categories Post --}}
    <section class="home-cat container">
    @foreach($categoriesList->take(3) as $category)
        <div class="">
            
            <div class="row section-title">
                <div class="col s12 l6 {{$category->header_color}}">
                    {{-- Catgory Title --}}
                    <h4>{{ $category->title }}</h4>
                   
                        <img src="
                        @if(strlen($category->icon) > 3)
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

            {{-- 1 featured Post related to category --}}
            @if($category->posts->count() && isset($category->posts)) 
                <?php $relCat = $category->approvedPosts()->latest()->first(); ?>
                    <div class="row">                
                        <div class="col m9 s12">
                            <div class="box-post">
                                <div class="card row">
                                    <div class="card-image col s12 l6">
                                        <img src="{{ $relCat->getFirstImageUrl('small') }}" alt="{{ $relCat->title }}">
                                    </div>                            
                                    <div class="card-content col s12 l6">
                                        {{-- <div class="col s12 m6">
                                        </div> --}}
                                            <h1 class="header center">{{$relCat->title}}</h1>

                                            <div class="row small">
                                                <div class="col s6">
                                                    <p><i class="fa fa-clock-o"></i> &nbsp;{{$relCat->created_at->diffForHumans()}}</p>
                                                </div>
                                                <div class="col s6">
                                                    <p><i class="fa fa-bars"></i>&nbsp; {{ $relCat->category->title}}</p>
                                                </div>
                                            </div>
                                            <p class="wrap">{{ $relCat->description }}</p>
                                            {{-- <div class="row share center"> </div> --}}
                                            <div class="row center btn-row">

                                                <a href="{{ url('/news/'.$post->slug) }}" class="btn waves-effect waves-light">@lang('homepage.read-more')</a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ads">
                               {!! Ads::show('responsive') !!}
                            </div>
                            <ul class="row small-post with-image latest">
                                @foreach($category->approvedPosts()->latest()->take(10)->skip(1)->get() as $news)
                                    <li class="col s12 m6">
                                        <a href="{{ url('news',$news->slug)}}">
                                            <div class="card group">
                                                <div class="card-image">
                                                    <img src="{{ $news->getFirstImageUrl('thumb') }}" alt="{{$post->title}}">
                                                </div>
                                                <div class="card-content">
                                                    <h4>{{ $news->title }}</h4>
                                                    <div class="row small">
                                                        <p>{{ $news->description }}</p>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </a>

                                    </li>
                                @endforeach
                            </ul>
                            
                            <a href="{{ route('singleCategory',$category->slug)}}" class="right btn">@lang('homepage.viewall')</a>
                        </div>
                        <div class="col s12 m3 side-post">
                            <div class="card">
                                {!! Ads::show('responsive') !!}
                                
                            </div>
                            <div class="absolute">
                                
                            @component('partials.component.sideList',['background' => $category->header_color ?? null ])
                                @slot('title')
                                    @lang('homepage.category-list')
                                @endslot
                               
                                    @include('partials.component.collectionItems',['route' => 'singleCategory','items' => $categoriesList])
                            @endcomponent
                            </div>
                        </div>
                    </div>   
                </div>
            @else
                @include('partials.home._notFound')
            @endif
        </div>


    @endforeach
    </section>


@stop
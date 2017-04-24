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
            <div class="section container">
                <div class="title-section">
                    <h1 class="header center">{{$post->title}}</h1>
                    <div class="btn cat {{$post->category->header_color}} ">
                        {{$post->category->title}}
                        <img src="
                        @if(strlen($post->category->icon) >4)
                            {{asset('/images/icons/'.$post->category->icon)}}
                        @else
                            {{asset('/images/icons/news.png')}}
                        @endif
                        " style="width: 20px; margin: 0 0 -3px 15px; height: 20px;" alt="{{$post->category->title}}">                    
                    </div>
                </div>
            </div>
            @if($post->checkImage())
            <div class="parallax-constainer container">
                <div class="paralsslax">
                    <img src="{{ $post->getFirstImageUrl() }}" alt="{{ $post->title }}">
                </div>
            </div>
            @endif
            <div class="content container">
                <div class="row">
                    <div class="col s12 m6">
                        @if($post->author)
                            <i class="fa fa-user"></i> &nbsp; {{$post->author}}
                        @endif
                    </div>
                    <div class="col s12 m6">
                        @if($post->address)
                            <p class="right">
                                <i class="fa fa-map"></i> &nbsp; {{$post->address}}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="row center">
                    <p class="wrap" style="font-size: 20px;">{{ $post->description }}</p>
                </div>
                <div class="row">
                    <div class="col s12 m9">
                        <div style="text-align: justify;">{!!$post->content!!}</div>
                        <br>
                        <div> <i class="fa fa-clock-o"></i> &nbsp; {{$post->created_at->format('D d, M, Y')}} </div>
                        
                    </div>
                    <div class="col s12 m3">
                        <h5>{{$post->callout}}</h5>
                    </div>
                </div>
            </div>
            {{-- 
            <div class="ads container">
               {!! Ads::show('responsive') !!}
            </div> 
            --}}
        </div>
    </section>

    <section class="container">
        <div class="row">
            <div class="col s12 m9">
                <div class="row section-title">
                    <div class="col s12">
                        <h4>@lang('homepage.related')</h4>
                        <i class="material-icons">leak_add</i>
                        <div class="skwed"></div>
                    </div>
                </div>

                <ul class=" small-post latest">
                    @include('partials.post._relatedPost',['latestNews' => $post->approvedSiblings()->latest()->take(8)->get()])
                </ul>
            </div>
            <div class="col s12 m3 side-post">
                @include('partials.post._latestPost')
            </div>
        </div>
    </section>

</div>

@stop


@push('scripts')
    <script>
    $(document).ready(function(){
        $('.carousel').carousel();
    });
    </script>
@endpush
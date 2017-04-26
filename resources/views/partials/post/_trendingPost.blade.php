{{--
<div class="card">
    {!! Ads::show('responsive') !!}
</div>
--}}
 @component('partials.component.sideList',['background' => strtolower($category->header_color) ?? null ])
    @slot('title')
        @lang('homepage.trending')
    @endslot
    @slot('icon')
    	<img src="{{asset('/images/icons/latest.png')}}" alt="">
    @endslot
   
    @include('partials.component.collectionItems',['route' => 'singleNews','items' => $trending])
@endcomponent
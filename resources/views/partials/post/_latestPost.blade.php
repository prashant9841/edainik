{{--
<div class="card">
    {!! Ads::show('responsive') !!}
</div>
--}}
 @component('partials.component.sideList',['background' => strtolower($category->header_color) ?? null ])
    @slot('title')
        @lang('homepage.latest')
    @endslot
   
    @include('partials.component.collectionItems',['route' => 'singleNews','items' => $latestNews])
@endcomponent
<div class="card">
    {!! Ads::show('responsive') !!}
</div>
 @component('partials.component.sideList',['background' => $category->header_color ?? null ])
    @slot('title')
        @lang('homepage.related')
    @endslot
   
        @include('partials.component.collectionItems',['route' => 'singleNews','items' => $latestNews])
@endcomponent
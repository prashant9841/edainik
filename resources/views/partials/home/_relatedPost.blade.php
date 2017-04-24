<div class="card">
    {!! Ads::show('responsive') !!}
</div>
@component('partials.component.sideList',['background' => $category->header_color ?? null ])
    @slot('title')
        @lang('homepage.latest')
    @endslot
    @slot('icon')
        <i class="material-icons">leak_add</i>sdk
    @endslot
    @include('partials.component.collectionItems',['route' => 'singleNews','items' => $category->approvedPosts()->take(8)->get()])
@endcomponent

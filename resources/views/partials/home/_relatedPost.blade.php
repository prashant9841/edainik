{{-- <div class="card">
    {!! Ads::show('responsive') !!}
</div> --}}
@component('partials.component.sideList',['background' => $category->header_color ?? null ])
    @slot('title')
        @lang('homepage.latest')
    @endslot
    @slot('icon')
        <img src="{{asset('/images/icons/latest.png')}}" alt="">
    @endslot
    @include('partials.component.collectionItems',['route' => 'singleNews','items' => $category->approvedPosts()->take(8)->get()])
@endcomponent

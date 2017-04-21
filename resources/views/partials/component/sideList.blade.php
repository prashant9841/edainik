<div class="card">
    <div class="card-content">
        <h4>{{ $title }}</h4>
        <ul class="collection">
        @if(isset($items))
            @foreach($items as $item)
                <a class="collection-item" href="{{ route($route,$item->slug) }}">{{$item->title}}</a>
            @endforeach
        @endif
        </ul>
    </div>
</div>
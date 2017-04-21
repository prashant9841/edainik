<div class="card">
	<div class="card-title {{$background ??  'light-blue accent-4'}}">
        <h4>{{ $title }}</h4>
		
	</div>
    <div class="card-content">
        {!! $slot !!}
    </div>
</div>
<div class="card">
	<div class="card-title lighten-1 light-blue accent-4 {{-- {{$background ??  'light-blue accent-4'}} --}}">
        <h4>{{ $title }}</h4>
        {!! $icon !!}
        
        <div class="skwed"></div>
		
	</div>
    <div class="card-content">
        {!! $slot !!}
    </div>
</div>
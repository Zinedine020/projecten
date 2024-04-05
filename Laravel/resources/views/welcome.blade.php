@foreach ($planets as $planet)
    <h2>{{ $planet['name'] }}</h2>
    {{ $planet['description'] }}
@endforeach
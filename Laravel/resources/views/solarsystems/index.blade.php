
@foreach ($solarSystems as $solarSystem)
    {{ $solarSystem->name }} - Number of Planets: {{ $solarSystem->planets_count }}
@endforeach


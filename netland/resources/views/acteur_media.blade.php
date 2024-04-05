<!DOCTYPE html>
<html>
<head>
    <title>Media van {{ $acteur->naam }}</title>
</head>
<body>
    <h1>Media van {{ $acteur->naam }}</h1>
    
    @if ($media->isNotEmpty())
        <ul>
            @foreach ($media as $medium)
                <li>
                    <h2>{{ $medium->title }}</h2>
                    <p>Description: {{ $medium->summary }}</p>
                    <p>Actors:</p>
                    <ul>
                        @foreach ($medium->actors as $actor)
                            <li>{{ $actor->first_name }} {{ $actor->last_name }}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    @else
        <p>Geen media gevonden voor deze acteur.</p>
    @endif
</body>
</html>

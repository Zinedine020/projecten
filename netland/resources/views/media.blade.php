<!DOCTYPE html>
<html>
<head>
    <title>Media</title>
</head>
<body>
    <h1>Media</h1>
    <h2>{{ $media->title }}</h2>
    <p>Description: {{ $media->summary }}</p>
    <p>Actors:</p>
    <ul>
        @foreach($media->actors as $actor)
            <li>{{ $actor->first_name }} {{ $actor->last_name }}</li>
        @endforeach
    </ul>
</body>
</html>

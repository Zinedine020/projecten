<!DOCTYPE html>
<html>
<head>
    <title>Series</title>
</head>
<body>
    <h1>Series</h1>
    <ul>
        @foreach($series as $serie)
            <li>{{ $serie->title }}</li>
        @endforeach
    </ul>
</body>
</html>

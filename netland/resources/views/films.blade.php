<!DOCTYPE html>
<html>
<head>
    <title>Films</title>
</head>
<body>
    <h1>Films</h1>
    <ul>
        @foreach($films as $film)
            <li>{{ $film->title }}</li>
        @endforeach
    </ul>
</body>
</html>

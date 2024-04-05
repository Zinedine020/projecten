<!DOCTYPE html>
<html>
<head>
    <title>Acteurs</title>
</head>
<body>
    <h1>Acteurs</h1>
    <ul>
        @foreach($acteurs as $acteur)
            <li>{{ $acteur->first_name }} {{ $acteur->last_name }}</li>
        @endforeach
    </ul>
</body>
</html>


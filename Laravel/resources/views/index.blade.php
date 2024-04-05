<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/planets/index.blade.php -->
<h1>All Planets</h1>
<ul>
    @foreach($planets as $planet)
        <li>{{ $planet->name }} - {{ $planet->description }}</li>
    @endforeach
</ul>

</body>
</html>
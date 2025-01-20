<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica Progetto</title>
</head>
<body>
    <h1><center>Modifica Progetto</center></h1>

    <form action="/projects/{{ $project->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Titolo:</span>
        <input type="text" name="title" value="{{ $project->title }}"><br>
        <span>Descrizione:</span>
        <textarea name="description">{{ $project->description }}</textarea>
        <input type="submit" value="Modifica">
    </form>
</body>
</html>
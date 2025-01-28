<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica Chef</title>

    <h3>Modificachef</h3>

    <form action="/chefs/{{$chef->id}}" method="post">
        @csrf
        @method('PATCH')
    <span>Inserisci nome</span>
    <input type="text" name="name" value="{{$chef->name}}">
    <span>Inserisci eta</span>
    <input type="number" name="age" value="{{$chef->age}}">
    <span>Inserisci livello</span>
    <input type="number" name="level" value="{{$chef->level}}">
    <input type="submit" value="Invia">
    </form>
</head>
<body>
    
</body>
</html>
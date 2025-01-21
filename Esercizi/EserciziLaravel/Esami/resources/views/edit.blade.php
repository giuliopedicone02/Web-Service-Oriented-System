<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica Esame</title>
</head>
<body>
    <h3>Modifica un nuovo esame</h3>

    <form action="/exams/{{$exam->id}}" method="post">
        @csrf
        @method('PATCH')
        <span>Modifica materia</span>
        <input type="text" name="name" value="{{$exam->name}}">
        <span>Numero CFU</span>
        <input type="number" name="cfu"  value="{{$exam->cfu}}">
        <span>Voto</span>
        <input type="number" name="mark"  value="{{$exam->mark}}">
        <input type="submit" value="Modifica">
    </form>
    
</body>
</html>
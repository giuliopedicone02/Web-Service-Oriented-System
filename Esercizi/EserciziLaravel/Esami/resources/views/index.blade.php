<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Esami</title>
</head>
<body>

    <h1><center>Esami in Laravel</center></h1>
    
    <table border="1px">
        <tr>
            <th>Nome</th>
            <th>CFU</th>
            <th>Voto</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($exam as $e)
            <tr>
                <td>{{$e->name}}</td>
                <td>{{$e->cfu}}</td>
                <td>{{$e->mark}}</td>
                <td>
                    <form action="exams/{{$e->id}}/edit" method="get">
                    <input type="submit" value="Modifica">
                </form>
                </td>
                <td>
                    <form action="exams/{{$e->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Elimina">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Inserisci un nuovo esame</h3>

    <form action="/exams" method="post">
        @csrf
        <span>Nome materia</span>
        <input type="text" name="name">
        <span>Numero CFU</span>
        <input type="number" name="cfu">
        <span>Voto</span>
        <input type="number" name="mark">
        <input type="submit" value="Invia">
    </form>
</body>
</html>
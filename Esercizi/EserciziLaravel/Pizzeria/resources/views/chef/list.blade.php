<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chef</title>
</head>

<body>
    <h1>
        <center>Chef</center>
    </h1>

    <h3>Lista degli chef</h3>

    <table border="1px">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Level</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($chef as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->age }}</td>
                <td>{{ $item->level }}</td>
                <td>
                    <form action="/chefs/{{ $item->id }}/edit" method="get">
                        <input type="submit" value="Modifica">
                    </form>
                </td>
                <td>
                    <form action="/chefs/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Elimina">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Aggiungi un nuovo chef</h3>

    <form action="/chefs" method="post">
        @csrf
        <span>Inserisci nome</span>
        <input type="text" name="name">
        <span>Inserisci eta</span>
        <input type="number" name="age">
        <span>Inserisci livello</span>
        <input type="number" name="level">
        <input type="submit" value="Invia">
    </form>
</body>

</html>

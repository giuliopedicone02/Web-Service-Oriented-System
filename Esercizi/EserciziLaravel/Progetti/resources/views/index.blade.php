<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Progetti</title>
</head>
<body>
    <h1><center>Progetti in Laravel</center></h1>

    <table border="1px">
        <tr>
            <th>Titolo</th>
            <th>Descrizione</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        
        @foreach ($project as $proj)
        <tr>
            <td>{{$proj->title}}</td>
            <td>{{$proj->description}}</td>
            <td>
                <form action="/projects/{{ $proj->id }}/edit" method="get">
                    <button type="submit">Modifica</button>
                </form>
            </td>
            <td>
                <form action="/projects/{{ $proj->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Elimina</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <h3>Inserimento dei progetti</h3>

    <form action="/projects" method="post">
        @csrf
        <span>Titolo: </span>
        <input type="text" name="title">
        <span>Descrizione: </span>
        <textarea name="description"></textarea>
        <input type="submit" value="Invia">
    </form>
</body>
</html>
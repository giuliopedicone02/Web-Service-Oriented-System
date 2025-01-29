<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista di Generi</title>
</head>

<body>
    <h1>
        <center>Lista dei generi</center>
    </h1>

    <table border="1px">
        <tr>
            <th>Nome</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($genres as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>
                    <form action="/genres/{{ $item->id }}/edit" method="get">
                        <input type="submit" value="Modifica">
                    </form>
                </td>
                <td>
                    <form action="/genres/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Elimina">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Inserisci un nuovo genere</h3>

    <form action="/genres" method="post">
        @csrf
        <span>Inserisci nome: </span>
        <input type="text" name="name">
        <input type="submit" value="Invia">
    </form>

    <h3>Visualizza i libri</h3>

    <a href="/books">Vai alla lista dei libri</a>
</body>

</html>

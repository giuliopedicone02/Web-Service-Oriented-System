<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista dei Generi</title>
</head>

<body>
    <h1>
        <center>Lista dei generi</center>
    </h1>

    <table border='1px'>
        <tr>
            <th>Nome</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($genre as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>
                    <form action="/genres/{{ $item->id }}/edit" method="get">
                        <button>Modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/genres/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Inserisci un nuovo genere</h3>

    <form action="/genres" method="post">
        @csrf
        <span>Inserisci nome</span>
        <input type="text" name="name">
        <button>Invia</button>
    </form>

    <h3>Visualizza i film</h3>
    <a href="/films">Vai ai film</a>
</body>

</html>

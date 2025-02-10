<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista dei Regali</title>
</head>

<body>
    <h1>
        <center>Lista dei regali</center>
    </h1>

    <table border='1px'>
        <tr>
            <th>Nome</th>
            <th>Brand</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($gift as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->brand }}</td>
                <td>
                    <form action="/gifts/{{ $item->id }}/edit" method="get">
                        <button>Modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/gifts/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Inserisci un nuovo regalo</h3>

    <form action="/gifts" method="post">
        @csrf
        <span>Inserisci nome:</span>
        <input type="text" name="name">
        <span>Inserisci brand:</span>
        <input type="text" name="brand">
        <button>Invia</button>
    </form>

    <h3>Vai alla lista delle persone</h3>
    <a href="/kids">Visualizza persone</a>
</body>

</html>

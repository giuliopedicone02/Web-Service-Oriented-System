<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista dei Brand</title>
</head>

<body>
    <h1>
        <center>Lista dei brand</center>
    </h1>

    <h3>Lista</h3>

    <table border="1px">
        <tr>
            <th>Nome</th>
            <th>Dipendenti</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($brand as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->employees }}</td>
                <td>
                    <form action="/brands/{{ $item->id }}/edit" method="get">
                        <button>Modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/brands/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Inserisci un nuovo brand</h3>

    <form action="/brands" method="post">
        @csrf
        <span>Nome del Brand:</span>
        <input type="text" name="name">
        <span>Numero dipendenti:</span>
        <input type="number" name="employees">
        <button>Invia</button>
    </form>

    <h3>Vai ai prodotti</h3>
    <a href="/products">Lista dei prodotti</a>
</body>

</html>

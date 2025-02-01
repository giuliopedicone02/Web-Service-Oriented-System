<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista delle mete</title>
</head>

<body>
    <h1>
        <center>Lista delle mete</center>
    </h1>

    <table border=1px>
        <tr>
            <th>Nome</th>
            <th>Nazione</th>
            <th>Abitanti</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($place as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->nation }}</td>
                <td>{{ $item->people }}</td>
                <td>
                    <form action="/places/{{ $item->id }}/edit" method="get">
                        <button>Modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/places/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Inserisci una nuova destinazione</h3>

    <form action="/places" method="post">
        @csrf
        <span>Inserisci nome: </span>
        <input type="text" name="name">

        <span>Inserisci nazione: </span>
        <input type="text" name="nation">

        <span>Inserisci abitanti: </span>
        <input type="numbers" name="people">

        <button>Invia</button>
    </form>

    <h3>Vai ai tour</h3>

    <a href="/tours">Lista dei tour</a>
</body>

</html>

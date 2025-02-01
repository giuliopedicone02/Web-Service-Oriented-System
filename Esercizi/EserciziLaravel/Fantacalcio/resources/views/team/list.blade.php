<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista dei team</title>
</head>

<body>
    <h1>
        <center>Lista dei Team</center>
    </h1>

    <h3>Lista</h3>

    <table border='1px'>
        <tr>
            <th>Nome</th>
            <th>Campionati vinti</th>
            <th>Coppe vinte</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($team as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->champions }}</td>
                <td>{{ $item->cups }}</td>
                <td>
                    <form action="/teams/{{ $item->id }}/edit" method="get">
                        <button>Modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/teams/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Inserisci un nuovo team</h3>

    <form action="/teams" method="post">
        @csrf
        <span>Inserisci nome: </span>
        <input type="text" name="name">
        <span>Inserisci campionati vinti: </span>
        <input type="number" name="champions">
        <span>Inserisci coppe vinte: </span>
        <input type="number" name="cups">
        <button>Invia</button>
    </form>

    <h3>Vai ai giocatori</h3>
    <a href="/players">Visualizza i Giocatori</a>
</body>

</html>

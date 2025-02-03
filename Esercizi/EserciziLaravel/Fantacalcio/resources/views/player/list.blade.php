<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista dei Giocatori</title>
</head>

<body>
    <h1>
        <center>Lista dei Giocatori</center>
    </h1>

    <h3>Lista</h3>

    <table border='1px'>
        <tr>
            <th>Nome</th>
            <th>Eta</th>
            <th>Infortunato</th>
            <th>Team</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($player as $item)
            @if ($item->age == 22)
                <tr style="background-color: coral">
                @else
                <tr>
            @endif
            <td>{{ $item->name }}</td>
            <td>{{ $item->age }}</td>
            <td>{{ $item->injured ? 'SI' : 'NO' }}</td>
            <td>{{ $item->team->name }}</td>

            <td>
                <form action="/players/{{ $item->id }}/edit" method="get">
                    <button>Modifica</button>
                </form>
            </td>
            <td>
                <form action="/players/{{ $item->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Elimina</button>
                </form>
            </td>
            </tr>
        @endforeach
    </table>

    <h3>Inserisci un nuovo giocatore</h3>

    <form action="/players" method="post">
        @csrf
        <span>Inserisci nome: </span>
        <input type="text" name="name">
        <span>Inserisci eta: </span>
        <input type="number" name="age">
        <span>Infortunato?</span>
        <input type="radio" name="injured" value='0' checked> NO
        <input type="radio" name="injured" value='1'> SI
        <span>Seleziona Team: </span>
        <select name="team_id">
            @foreach ($team as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Invia</button>
    </form>

    <h3>Visualizza giocatori per team</h3>
    <form action="/players/findByTeam" method="post">
        @csrf
        <span>Seleziona Team: </span>
        <select name="team_id">
            @foreach ($team as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Invia</button>
    </form>

    <h3>Visualizza giocatori con età superiore a: </h3>
    <form action="/players/greaterThanAge" method="post">
        @csrf
        <span>Età: </span>
        <input type="number" name="age" value="1">
        <button>Invia</button>
    </form>

    <h3>Ordina per età crescente</h3>
    <a href="/players/orderByAge">Ordina per età</a>

    <h3>Visualizza Maggiorenni</h3>
    <a href="/players/greaterThan18">Visualizza maggiorenni</a>

    <h3>Elimina Minorenni</h3>
    <a href="/players/delete/lowerThan18">Elimina minorenni</a>

    <h3>Vai ai team</h3>
    <a href="/teams">Visualizza i Team</a>
</body>

</html>

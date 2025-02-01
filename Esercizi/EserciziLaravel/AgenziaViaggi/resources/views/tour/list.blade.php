<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista dei tour</title>
</head>

<body>
    <h1>
        <center>Lista dei tour</center>
    </h1>

    <table border=1px>
        <tr>
            <th>Titolo</th>
            <th>Destinazione</th>
            <th>Prezzo</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($tour as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->place->name }}</td>
                <td>{{ $item->price }}</td>
                <td>
                    <form action="/tours/{{ $item->id }}/edit" method="get">
                        <button>Modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/tours/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Inserisci un nuovo tour</h3>

    <form action="/tours" method="post">
        @csrf
        <span>Inserisci titolo: </span>
        <input type="text" name="title">

        <span>Inserisci destinazione: </span>
        <select name="place_id">
            @foreach ($place as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>

        <span>Inserisci prezzo: </span>
        <input type="number" name="price">

        <button>Invia</button>
    </form>

    <h3>Vai alle destinazioni</h3>

    <a href="/places">Lista delle destinazioni</a>
</body>

</html>

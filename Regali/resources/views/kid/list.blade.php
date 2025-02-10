<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista dei Bambini</title>
</head>

<body>
    <h1>
        <center>Lista dei bambini</center>
    </h1>

    <table border='1px'>
        <tr>
            <th>Nome</th>
            <th>Età</th>
            <th>Indirizzo</th>
            <th>Regalo</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($kid as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->age }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->gift->name }}</td>
                <td>
                    <form action="/kids/{{ $item->id }}/edit" method="get">
                        <button>Modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/kids/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Inserisci un nuovo bambino</h3>

    <form action="/kids" method="post">
        @csrf
        <span>Inserisci nome:</span>
        <input type="text" name="name">
        <span>Inserisci età:</span>
        <input type="number" name="age">
        <span>Inserisci indirizzo:</span>
        <input type="text" name="address">
        <span>Inserisci regalo:</span>
        <select name="gift_id">
            @foreach ($gift as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Invia</button>
    </form>

    <h3>Vai alla lista dei regali</h3>
    <a href="/gifts">Visualizza regali</a>

    <h3>Filtra per regalo</h3>
    <form action="/kids/filterByGift" method="post">
        @csrf
        <span>Cerca regalo:</span>
        <select name="gift_id">
            @foreach ($gift as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Invia</button>
    </form>
</body>

</html>

<!DOCTYPE html>
<html lang="it">

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

    <table border="1px">
        <tr>
            <th>Nome</th>
            <th>Buono</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($kid as $item)
            @if ($item->good)
                <tr style="background-color: green">
                @else
                <tr style="background-color: red; color: white">
            @endif
            <td>{{ $item->name }}</td>
            <td>{{ $item->good ? 'SI' : 'NO' }}</td>
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
        <span>Inserisci nome</span>
        <input type="text" name="name">
        <span>Buono?</span>
        <input type="radio" name="good" value='1'> SI
        <input type="radio" name="good" value='0'> NO
        <button>Invia</button>
    </form>

    <h3>Tutti i bambini sono buoni</h3>
    <a href="/kids/allGood">Rendi tutti i bambini buoni</a>

    <h3>Tutti i bambini sono cattivi</h3>
    <a href="/kids/allBad">Rendi tutti i bambini cattivi</a>

    <h3>Elimina tutti i bambini cattivi</h3>
    <a href="/kids/deleteCattivi">Elimina tutti i bambini cattivi</a>

    <h3>Visualizza i regali</h3>
    <a href="/gifts">Lista dei regali</a>
</body>

</html>

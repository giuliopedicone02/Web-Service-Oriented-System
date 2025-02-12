<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista dei regali</title>
</head>

<body>

    <h1>
        <center>Lista dei regali</center>
    </h1>

    <table border="1px">
        <tr>
            <th>Nome</th>
            <th>Stato</th>
            <th>Bambino</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($gift as $item)
            @if ($item->status)
                <tr style="background-color: green">
                @else
                <tr style="background-color: red; color: white">
            @endif
            <td>{{ $item->name }}</td>
            <td>{{ $item->status ? 'CONFERMATO' : 'ANNULLATO' }}</td>
            <td>{{ $item->kid->name }}</td>

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
        <span>Inserisci nome</span>
        <input type="text" name="name">
        <span>Stato?</span>
        <input type="radio" name="status" value='1'> CONFERMATO
        <input type="radio" name="status" value='0'> ANNULLATO
        <span>Seleziona bambino</span>
        <select name="kid_id">
            @foreach ($kid as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Invia</button>
    </form>

    <h3>Elimina tutti i regali annullati</h3>
    <a href="/gifts/deleteAnnullati">Elimina tutti i regali annullati</a>

    <h3>Visualizza i bambini</h3>
    <a href="/kids">Lista dei bambini</a>
</body>

</html>

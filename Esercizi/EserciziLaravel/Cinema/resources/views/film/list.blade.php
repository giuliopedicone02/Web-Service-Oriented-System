<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista dei Film</title>
</head>

<body>
    <h1>
        <center>Lista dei film</center>
    </h1>

    <table border='1px'>
        <tr>
            <th>Nome</th>
            <th>Anno</th>
            <th>Autore</th>
            <th>Genere</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($film as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->year }}</td>
                <td>{{ $item->author }}</td>
                <td>{{ $item->genre->name }}</td>

                <td>
                    <form action="/films/{{ $item->id }}/edit" method="get">
                        <button>Modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/films/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Inserisci un nuovo film</h3>

    <form action="/films" method="post">
        @csrf
        <span>Inserisci nome</span>
        <input type="text" name="name">
        <span>Inserisci anno</span>
        <input type="number" name="year">
        <span>Inserisci autore</span>
        <input type="text" name="author">
        <span>Inserisci genere</span>
        <select name="genre_id">
            @foreach ($genre as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Invia</button>
    </form>

    <h3>Filtra per genere</h3>
    <form action="/films/filterByGenre" method="post">
        @csrf
        <span>Seleziona genere</span>
        <select name="genre_id">
            @foreach ($genre as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Cerca</button>
    </form>

    <h3>Incrementa l'anno dei film</h3>
    <a href="/films/addYear">Aumenta l'anno</a>

    <h3>Visualizza i generi</h3>
    <a href="/genres">Vai ai generi</a>
</body>

</html>

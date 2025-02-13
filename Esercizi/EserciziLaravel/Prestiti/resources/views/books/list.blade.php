<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista dei Libri</title>
</head>

<body>
    <h1>
        <center>Lista dei Libri</center>
    </h1>

    <table border='1px'>
        <tr>
            <th>Titolo</th>
            <th>Autore</th>
            <th>Genere</th>
            <th>Copie Disponibili</th>
            <th>Modifica</th>
            <th>Elimina</th>
            <th>Filtra</th>
        </tr>
        @foreach ($book as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->author }}</td>
                <td>{{ $item->genre }}</td>
                <td>{{ $item->available_copies }}</td>
                <td>
                    <form action="/books/{{ $item->id }}/edit" method="get">
                        <button>Modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/books/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Elimina</button>
                    </form>
                </td>
                <td>
                    <a href="/loans/filterByBook/{{ $item->id }}">Filtra</a>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Inserisci un nuovo libro</h3>

    <form action="/books" method="post">
        @csrf
        <span>Inserisici titolo</span>
        <input type="text" name="title">
        <span>Inserisici autore</span>
        <input type="text" name="author">
        <br><br>
        <span>Inserisici genere</span>
        <input type="text" name="genre">
        <span>Inserisici copie disponibili</span>
        <input type="number" name="available_copies">
        <button>Invia</button>
    </form>

    <h3>Visualizza Prestiti</h3>
    <a href="/loans">Lista dei prestiti</a>
</body>

</html>

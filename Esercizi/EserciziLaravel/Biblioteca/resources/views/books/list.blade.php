<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista di Libri</title>
</head>

<body>
    <h1>
        <center>Lista dei libri</center>
    </h1>

    <table border="1px">
        <tr>
            <th>Nome</th>
            <th>Autore</th>
            <th>Anno</th>
            <th>Genere</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($books as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->author }}</td>
                <td>{{ $item->year }}</td>
                <td>{{ $item->genre->name }}</td>

                <td>
                    <form action="/books/{{ $item->id }}/edit" method="get">
                        <input type="submit" value="Modifica">
                    </form>
                </td>
                <td>
                    <form action="/books/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Elimina">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Inserisci un nuovo libro</h3>

    <form action="/books" method="post">
        @csrf
        <span>Inserisci nome: </span>
        <input type="text" name="name">
        <span>Inserisci autore: </span>
        <input type="text" name="author">
        <span>Inserisci anno: </span>
        <input type="number" name="year">
        <span>Inserisci genere: </span>
        <select name="genre_id">
            @foreach ($genres as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Invia">
    </form>

    <h3>Visualizza i generi</h3>

    <a href="/genres">Vai alla lista dei generi</a>
</body>

</html>

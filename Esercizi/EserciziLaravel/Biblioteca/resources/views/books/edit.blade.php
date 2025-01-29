<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica Genere</title>
</head>

<body>
    <h1>
        <center>Modifica libro</center>
    </h1>

    <h3>Modifica libro</h3>

    <form action="/books/{{ $book->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Inserisci nome: </span>
        <input type="text" name="name" value="{{ $book->name }}">
        <span>Inserisci autore: </span>
        <input type="text" name="author" value="{{ $book->author }}">
        <span>Inserisci anno: </span>
        <input type="number" name="year" value="{{ $book->year }}">
        <span>Inserisci genere: </span>
        <select name="genre_id">
            @foreach ($genres as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Modifica">
    </form>
</body>

</html>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica Libro</title>
</head>

<body>

    <h1>
        <center>Modifica Libro</center>
    </h1>

    <h3>Modifica libro</h3>

    <form action="/books/{{ $book->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Modifica titolo</span>
        <input type="text" name="title" value="{{ $book->title }}">
        <span>Modifica autore</span>
        <input type="text" name="author" value="{{ $book->author }}">
        <span>Modifica genere</span>
        <input type="text" name="genre" value="{{ $book->genre }}">
        <span>Modifica copie disponibili</span>
        <input type="number" name="available_copies" value="{{ $book->available_copies }}">
        <button>Modifica</button>
    </form>
</body>

</html>

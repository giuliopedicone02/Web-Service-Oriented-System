<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica film</title>
</head>

<body>
    <h1>
        <center>Modifica film</center>
    </h1>

    <h3>Modifica film</h3>

    <form action="/films/{{ $film->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Inserisci nome</span>
        <input type="text" name="name" value="{{ $film->name }}">
        <span>Inserisci anno</span>
        <input type="number" name="year" value="{{ $film->year }}">
        <span>Inserisci autore</span>
        <input type="text" name="author" value="{{ $film->author }}">
        <span>Inserisci genere</span>
        <select name="genre_id">
            @foreach ($genre as $item)
                <option value="{{ $item->id }}" @if ($item->id == $film->genre_id) selected @endif>
                    {{ $item->name }}
            @endforeach
            </option>
        </select>
        <button>Modifica</button>
    </form>
</body>

</html>

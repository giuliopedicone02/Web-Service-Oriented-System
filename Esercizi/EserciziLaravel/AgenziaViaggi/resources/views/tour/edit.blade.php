<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica Tour</title>
</head>

<body>
    <h1>
        <center>Modifica Tour</center>
    </h1>

    <h3>Inserisci un nuovo tour</h3>

    <form action="/tours/{{ $tour->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Modifica titolo: </span>
        <input type="text" name="title" value="{{ $tour->title }}">

        <span>Modifica destinazione: </span>
        <select name="place_id">
            @foreach ($place as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>

        <span>Modifica prezzo: </span>
        <input type="number" name="price" value="{{ $tour->price }}">

        <button>Modifica</button>
    </form>
</body>

</html>

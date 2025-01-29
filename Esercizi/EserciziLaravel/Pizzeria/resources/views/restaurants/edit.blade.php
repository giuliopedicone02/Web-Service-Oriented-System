<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica ristorante</title>
</head>

<body>
    <h3>Modifica ristorante</h3>

    <form action="/restaurants/{{ $restaurant->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Inserisci nome ristorante</span>
        <input type="text" name="name" value="{{ $restaurant->name }}">
        <span>Inserisci anno di fondazione</span>
        <input type="number" name="foundation" value="{{ $restaurant->foundation }}">
        <span>Inserisci numero stelle</span>
        <input type="number" name="star" value="{{ $restaurant->star }}">
        <span>Inserisci chef</span>
        <select name="chefId">
            @foreach ($chefs as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Invia">
    </form>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica regalo</title>
</head>

<body>
    <h3>Modifica bambino</h3>

    <form action="/kids/{{ $kid->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Inserisci nome:</span>
        <input type="text" name="name" value="{{ $kid->name }}">
        <span>Inserisci età:</span>
        <input type="number" name="age" value="{{ $kid->age }}">
        <span>Inserisci indirizzo:</span>
        <input type="text" name="address" value="{{ $kid->address }}">
        <span>Inserisci regalo:</span>
        <select name="gift_id">
            @foreach ($gift as $item)
                <option value="{{ $item->id }}" @if ($item->id == $kid->gift_id) selected @endif>
                    {{ $item->name }}</option>
            @endforeach
        </select>
        <button>Modifica</button>
    </form>

</body>

</html>

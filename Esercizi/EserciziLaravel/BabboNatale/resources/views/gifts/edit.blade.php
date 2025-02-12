<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica Bambino</title>
</head>

<body>

    <h1>
        <center>Modifica bambino</center>
    </h1>

    <h3>Modifica regalo</h3>

    <form action="/gifts/{{ $gift->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Inserisci nome</span>
        <input type="text" name="name" value='{{ $gift->name }}'>
        <span>Stato?</span>
        <input type="radio" name="status" @if ($gift->status == '1') checked @endif value='1'> CONFERMATO
        <input type="radio" name="status" @if ($gift->status == '0') checked @endif value='0'> ANNULLATO
        <span>Seleziona bambino</span>
        <select name="kid_id">
            @foreach ($kid as $item)
                <option value="{{ $item->id }}" @if ($gift->kid_id == $item->id) selected @endif>
                    {{ $item->name }}</option>
            @endforeach
        </select>
        <button>Modifica</button>
    </form>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica Giocatore</title>
</head>

<body>
    <h1>
        <center>Modifica Giocatore</center>
    </h1>

    <h3>Modifica Giocatore</h3>

    <form action="/players/{{ $player->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Inserisci nome: </span>
        <input type="text" name="name" value="{{ $player->name }}">
        <span>Inserisci eta: </span>
        <input type="number" name="age" value="{{ $player->age }}">
        <span>Infortunato?</span>
        <input type="radio" name="injured" value="0" @if ($player->injured == 0) checked @endif> NO
        <input type="radio" name="injured" value="1" @if ($player->injured == 1) checked @endif> SI

        <span>Seleziona Team: </span>
        <select name="team_id">
            @foreach ($team as $item)
                <option value="{{ $item->id }}" @if ($item->id == $player->team_id) selected @endif>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>

        <button>Modifica</button>
    </form>
</body>

</html>

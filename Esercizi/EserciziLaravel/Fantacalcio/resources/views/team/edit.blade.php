<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica Team</title>
</head>

<body>
    <h1>
        <center>Modifica Team</center>
    </h1>

    <h3>Modifica team</h3>

    <form action="/teams/{{ $team->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Modifica nome: </span>
        <input type="text" name="name" value="{{ $team->name }}">
        <span>Modifica campionati vinti: </span>
        <input type="number" name="champions" value="{{ $team->champions }}">
        <span>Modifica coppe vinte: </span>
        <input type="number" name="cups" value="{{ $team->cups }}">
        <button>Modifica</button>
    </form>
</body>

</html>

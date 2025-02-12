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

    <h3>Inserisci un nuovo bambino</h3>

    <form action="/kids/{{ $kid->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Modifica nome</span>
        <input type="text" name="name" value='{{ $kid->name }}'>
        <span>Buono?</span>
        <input type="radio" name="good" @if ($kid->good == '1') checked @endif value='1'> SI
        <input type="radio" name="good" @if ($kid->good == '0') checked @endif value='0'> NO
        <button>Modifica</button>
    </form>
</body>

</html>

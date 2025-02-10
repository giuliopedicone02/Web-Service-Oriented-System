<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica regalo</title>
</head>

<body>
    <h3>Modifica regalo</h3>

    <form action="/gifts/{{ $gift->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Modifica nome:</span>
        <input type="text" name="name" value="{{ $gift->name }}">
        <span>Modifica brand:</span>
        <input type="text" name="brand" value="{{ $gift->brand }}">
        <button>Invia</button>
    </form>
</body>

</html>

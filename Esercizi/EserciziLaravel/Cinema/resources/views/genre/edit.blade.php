<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica genere</title>
</head>

<body>
    <h1>
        <center>Modifica genere</center>
    </h1>

    <h3>Modifica genere</h3>

    <form action="/genres/{{ $genre->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Modifica nome</span>
        <input type="text" name="name" value="{{ $genre->name }}">
        <button>Modifica</button>
    </form>
</body>

</html>

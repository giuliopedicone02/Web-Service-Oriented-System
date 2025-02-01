<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica Brand</title>
</head>

<body>
    <h3>Inserisci un nuovo brand</h3>

    <form action="/brands/{{ $brand->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Nome del Brand:</span>
        <input type="text" name="name" value="{{ $brand->name }}">
        <span>Numero dipendenti:</span>
        <input type="number" name="employees" value="{{ $brand->employees }}">
        <button>Invia</button>
    </form>
</body>

</html>

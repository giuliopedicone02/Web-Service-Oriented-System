<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica Dipartimento</title>
</head>

<body>

    <h3>Modifica dipartimento</h3>

    <form action="/departments/{{ $department->id }}" method="post">
        @csrf
        @method('PATCH')
        <h3>Inserisci nome</h3>
        <input type="text" name="name" value="{{ $department->name }}">
        <button>Invia</button>
    </form>
</body>

</html>

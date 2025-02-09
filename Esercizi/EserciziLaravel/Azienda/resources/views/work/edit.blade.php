<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica Dipartimento</title>
</head>

<body>

    <h3>Inserisci un nuovo lavoro</h3>

    <form action="/works/{{ $work->id }}" method="post">
        @csrf
        @method('PATCH')
        <h3>Inserisci nome</h3>
        <input type="text" name="name" value="{{ $work->name }}">
        <h3>Inserisci salario</h3>
        <input type="text" name="salary" value="{{ $work->salary }}">
        <h3>Inserisci dipendenti</h3>
        <input type="text" name="employees" value="{{ $work->employees }}">
        <h3>Inserisci disponibilità</h3>
        <input type="radio" name="availability" @if ($work->availability == '0') checked @endif value='0'> NO
        <input type="radio" name="availability" @if ($work->availability == '1') checked @endif value='1'> SI
        <h3>Inserisci reparto</h3>
        <select name="department_id">
            @foreach ($department as $item)
                <option value="{{ $item->id }}" @if ($item->id == $work->department_id) selected @endif>
                    {{ $item->name }}</option>
            @endforeach
        </select>
        <button>Invia</button>
    </form>
</body>

</html>

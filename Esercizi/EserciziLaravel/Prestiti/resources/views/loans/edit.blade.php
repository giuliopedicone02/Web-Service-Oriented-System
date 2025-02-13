<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica Libro</title>
</head>

<body>

    <h1>
        <center>Modifica Prestito</center>
    </h1>

    <h3>Modifica prestito</h3>

    <form action="/loans/{{ $loan->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Seleziona libro</span>
        <select name="book_id">
            @foreach ($book as $item)
                <option value="{{ $item->id }}" @if ($item->id == $loan->book_id) selected @endif>{{ $item->title }}
                </option>
            @endforeach
        </select>
        <br><br>
        <span>Inserisici nome utente</span>
        <input type="text" name="user_name" value="{{ $loan->user_name }}">
        <span>Inserisici email</span>
        <input type="email" name="email" value="{{ $loan->email }}">
        <br><br>
        <span>Inserisici data prestito</span>
        <input type="date" name="loan_date" value="{{ $loan->loan_date }}">
        <span>Inserisici data restituzione</span>
        <input type="date" name="return_date" value="{{ $loan->return_date }}"">
        <span>Restituito?</span>
        <input type="radio" name="returned" @if ($loan->returned == '0') checked @endif value='0'> NO
        <input type="radio" name="returned" @if ($loan->returned == '1') checked @endif value='1'> SI
        <br><br>
        <button>Modifica</button>
    </form>
</body>

</html>

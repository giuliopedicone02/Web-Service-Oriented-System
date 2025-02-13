<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista dei Prestiti</title>
</head>

<body>
    <h1>
        <center>Lista dei Prestiti</center>
    </h1>

    <table border='1px'>
        <tr>
            <th>Libro</th>
            <th>Nome utente</th>
            <th>Email</th>
            <th>Data Prestito</th>
            <th>Data Restituzione</th>
            <th>Restituito</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($loan as $item)
            <tr>
                <td>{{ $item->book->title }}</td>
                <td>{{ $item->user_name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->loan_date }}</td>
                <td>{{ $item->return_date }}</td>
                <td>{{ $item->returned ? 'SI' : 'NO' }}</td>
                <td>
                    <form action="/loans/{{ $item->id }}/edit" method="get">
                        <button>Modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/loans/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Inserisci un nuovo prestito</h3>

    <form action="/loans" method="post">
        @csrf
        <span>Seleziona libro</span>
        <select name="book_id">
            @foreach ($book as $item)
                <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
        </select>
        <br><br>
        <span>Inserisici nome utente</span>
        <input type="text" name="user_name">
        <br><br>
        <span>Inserisici email</span>
        <input type="email" name="email">
        <br><br>
        <span>Inserisici data prestito</span>
        <input type="date" name="loan_date">
        <span>Inserisici data restituzione</span>
        <input type="date" name="return_date">
        <span>Restituito?</span>
        <input type="radio" name="returned" value='0'> NO
        <input type="radio" name="returned" value='1'> SI
        <br><br>
        <button>Invia</button>
    </form>

    <h3>Filtra per libro</h3>
    <form action="/loans/filterByBook" method="post">
        @csrf
        <span>Seleziona libro</span>
        <select name="book_id">
            @foreach ($book as $item)
                <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
        </select>
        <button>Cerca</button>
    </form>

    <h3>Visualizza Libri</h3>
    <a href="/books">Lista dei libri</a>
</body>

</html>

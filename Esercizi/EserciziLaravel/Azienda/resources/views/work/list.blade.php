<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista dei lavori</title>
</head>

<body>
    <h1>
        <center>Lista dei Lavori</center>
    </h1>

    <table border='1px'>
        <tr>
            <th>Nome</th>
            <th>Salario</th>
            <th>Dipendenti</th>
            <th>Disponibilità</th>
            <th>Dipartimento</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($work as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->salary }}</td>
                <td>{{ $item->employees }}</td>
                <td>{{ $item->availability ? 'SI' : 'NO' }}</td>
                <td>{{ $item->department->name }}</td>

                <td>
                    <form action="/works/{{ $item->id }}/edit" method="get">
                        <button>Modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/works/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Inserisci un nuovo lavoro</h3>

    <form action="/works" method="post">
        @csrf
        <b>Inserisci nome</b>
        <input type="text" name="name">
        <b>Inserisci salario</b>
        <input type="text" name="salary">
        <b>Inserisci dipendenti</b>
        <input type="text" name="employees"><br><br>
        <b>Inserisci disponibilità</b>
        <input type="radio" name="availability" value='0'> NO
        <input type="radio" name="availability" value='1'> SI <br><br>
        <b>Inserisci reparto</b>
        <select name="department_id">
            @foreach ($department as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Invia</button>
    </form>

    <h3>Filtra per Reparti</h3>
    <form action="/works/filterByDepartment" method="post">
        @csrf
        <b>Seleziona reparto</b>
        <select name="department_id">
            @foreach ($department as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Filtra</button>
    </form>


    <h3>Vai ai reparti</h3>
    <a href="/departments">Lista dei reparti</a>
</body>

</html>

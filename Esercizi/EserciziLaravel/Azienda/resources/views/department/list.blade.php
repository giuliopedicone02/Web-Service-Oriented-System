<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista dei reparti</title>
</head>

<body>
    <h1>
        <center>Lista dei Dipartimenti</center>
    </h1>

    <table border='1px'>
        <tr>
            <th>Nome</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($department as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>
                    <form action="/departments/{{ $item->id }}/edit" method="get">
                        <button>Modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/departments/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Inserisci un nuovo reparto</h3>

    <form action="/departments" method="post">
        @csrf
        <h3>Inserisci nome</h3>
        <input type="text" name="name">
        <button>Invia</button>
    </form>
</body>

</html>

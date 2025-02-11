<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista dei ristoranti</title>
</head>

<body>
    <h3>Lista dei ristoranti</h3>

    <table border="1px">
        <tr>
            <th>Name</th>
            <th>Foundation</th>
            <th>Star</th>
            <th>Chef</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($restaurant as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->foundation }}</td>
                <td>{{ $item->star }}</td>
                <td>{{ $item->chef->name }}</td>
                <td>
                    <form action="/restaurants/{{ $item->id }}/edit" method="get">
                        <input type="submit" value="Modifica">
                    </form>
                </td>
                <td>
                    <form action="/restaurants/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Elimina">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Inserimento di un nuovo ristorante</h3>

    <form action="/restaurants" method="post">
        @csrf
        <span>Inserisci nome ristorante</span>
        <input type="text" name="name">
        <span>Inserisci anno di fondazione</span>
        <input type="number" name="foundation"><br><br>
        <span>Inserisci numero stelle</span>
        <input type="number" name="star">
        <span>Inserisci chef</span>
        <select name="chefId">
            @foreach ($chefs as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Invia">
    </form>

    <h3>Filtra per chef</h3>
    <form action="/restaurants/filterByChef" method="post">
        @csrf
        <span>Inserisci chef</span>
        <select name="chef_id">
            @foreach ($chefs as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Invia">
    </form>

    <h3>Elimina tutti gli chef</h3>
    <a href="/restaurants/deleteAll">Eliminali tutti</a>

    <h3>Visualizza la lista degli chef</h3>
    <a href="/chefs">Lista chefs</a>
</body>

</html>

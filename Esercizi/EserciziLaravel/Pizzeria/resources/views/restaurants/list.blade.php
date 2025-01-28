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
                <td>{{$item->name}}</td>
                <td>{{$item->foundation}}</td>
                <td>{{$item->star}}</td>
                <td>{{$item->chef_id}}</td>
                <td>Modifica</td>
                <td>Elimina</td>
            </tr>
        @endforeach
    </table>

    <h3>Inserimento di un nuovo ristorante</h3>

    <form action="/restaurants" method="post">
    <span>Inserisci nome ristorante</span>
    <input type="text" name="name">
    <span>Inserisci anno di fondazione</span>
    <input type="number" name="foundation">
    <span>Inserisci numero stelle</span>
    <input type="number" name="star">
    <span>Inserisci chef</span>
    <select name="chefId">
        @foreach ($chefs as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    <input type="submit" value="Invia">
    </form>
</body>
</html>
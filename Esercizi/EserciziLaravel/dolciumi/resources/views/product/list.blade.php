<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista dei prodotti</title>
</head>

<body>
    <h1>
        <center>Lista dei prodotti</center>
    </h1>

    <h3>Lista</h3>

    <table border="1px">
        <tr>
            <th>Nome</th>
            <th>Brand</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>
        @foreach ($products as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->brand->name }}</td>
                <td>
                    <form action="/products/{{ $item->id }}/edit" method="get">
                        <button>Modifica</button>
                    </form>
                </td>
                <td>
                    <form action="/products/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Elimina</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </table>

    <h3>Inserisci un nuovo prodotto</h3>

    <form action="/products" method="post">
        @csrf
        <span>Inserisci nome</span>
        <input type="text" name="name">
        <span>Seleziona Brand</span>
        <select name="brand_id">
            @foreach ($brands as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Invia</button>
    </form>

    <h3>Vai ai brand</h3>
    <a href="/brands">Lista dei brand</a>
</body>

</html>

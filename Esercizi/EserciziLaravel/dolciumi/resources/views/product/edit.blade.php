<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica Prodotto</title>
</head>

<body>
    <h3>Modifica prodotto</h3>

    <form action="/products/{{ $product->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Inserisci nome</span>
        <input type="text" name="name" value="{{ $product->name }}">
        <span>Seleziona Brand</span>
        <select name="brand_id">
            @foreach ($brands as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button>Invia</button>
    </form>
</body>

</html>

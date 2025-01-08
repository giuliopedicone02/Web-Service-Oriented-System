@extends('layout')
@section('contenuto')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello Laravel</title>
</head>

<body>
    <h1>
        <center>Hello!</center>
    </h1>

    <?php
    echo "<b> Today is: </b>" . date("l d-m-y");
    ?>

    <h3> Parametro URL time: {{$tempo}}</h3>
</body>

</html>
@endsection
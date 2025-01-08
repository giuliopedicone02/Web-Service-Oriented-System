@extends('layout')

@section('contenuto')
    <h1>Benvenuti!</h1>
    <b>Azione preferita:</b> 
    <?php
    foreach ($azione_pref as $azione) :
        echo $azione." ";
    endforeach;
    ?>
@endsection

@extends('layout.app')

@section('title','coche con id:'.$coche->id);

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Potencia</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$coche->marca->marca}}</td>
            <td>{{$coche->modelo}}</td>
            <td>{{$coche->potencia}}</td>
        </tr>
    </tbody>
</table>

@stop

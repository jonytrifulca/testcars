@extends('layout.app')

@section('content')
<form method="POST" action="{{ URL::to('coches')}}">
    @csrf
    <div class="form-group">
        <label>Marca</label>
        <select class="form-control" name="marca_id">
            @foreach ($marcas as $marca)
            <option value="{{$marca->id}}">{{$marca->marca}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Modelo</label>
        <input type="text" class="form-control" name="modelo">
    </div>
    <div class="form-group">
        <label>Potencia</label>
        <input type="text" class="form-control" name="potencia">
    </div>

    <input type="submit" class="btn btn-primary" value="Crear coche">
</form>
@stop

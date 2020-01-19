@extends('layout.app')

@section('content')
<form method="POST" action="{{ URL::to('coches/'.$coche->id)}}">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label>Marca</label>
        <select class="form-control" name="marca_id">
            @foreach ($marcas as $marca)
            <option value="{{$marca->id}}" @if($marca->id == $coche->marca_id) selected @endif>
                {{$marca->marca}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Modelo</label>
        <input type="text" class="form-control" name="modelo" value="{{$coche->modelo}}">
    </div>
    <div class="form-group">
        <label>Potencia</label>
        <input type="text" class="form-control" name="potencia" value="{{$coche->potencia}}">
    </div>

    <input type="submit" class="btn btn-primary" value="Actualizar coche">
</form>
@stop

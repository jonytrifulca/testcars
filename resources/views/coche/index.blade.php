@extends('layout.app')

@section('title','listado coches')


@section('content')

<span>
    @if(session('message'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{session('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</span>

<div class="row">
    <div class="col-12 text-right">
        <a class="btn btn-primary" href="{{URL::to('coches/create')}}">Nuevo Coche</a>
    </div>

    <table class="table mt-5">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Potencia</th>
                <th>Ver</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coches as $coche)
            <tr>
                <td>{{$coche->marca->marca}}</td>
                <td>{{$coche->modelo}}</td>
                <td>{{$coche->potencia}}</td>
                <td>
                    <a title="Editar coche" class="btn btn-primary" href="{{ URL::to('coches/'.$coche->id)}}">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                </td>
                <td>
                    <a title="Editar coche" class="btn btn-primary" href="{{ URL::to('coches/'.$coche->id.'/edit')}}">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                </td>
                <td>
                    <form action="{{ URL::to('coches/'.$coche->id)}}" method="post"
                        onsubmit="return confirm('¿Desea eliminar el coche: {{$coche->marca->marca}} / {{$coche->modelo}}?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"
                                aria-hidden="true"></i></button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @stop

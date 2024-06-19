@extends('adminlte::page')
@section('title', 'puestos')
@section('content_header')
<head>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tablas.css') }}">
    <link rel="stylesheet" href="{{ asset('css/botones.css') }}">
</head>
    <h1></h1>
@stop

@section('content')
<div class="container">
    <div class="header">
        <h3 style="text-align: center;" > LISTA DE PUESTOS</h3>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th class="table th">Código</th>
                    <th class="table th">Nombre</th>
                    <th class="table th">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($puestos as $puesto)
                    <tr >
                        <td>{{$puesto['codigo']}}</td>
                        <td>{{$puesto['nombre']}}</td>
                        <td>
                            <a href="{{route('puesto.nueva',['id'=>$puesto['id'] ])}}" class="">
                                <span class="btn">Editar</span>
                            </a>
                            <form action="{{route('puesto.eliminar',['id'=>$puesto['id']])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{$puesto['id']}}">
                                <button class="btn-1" type="submit">
                                    <span class="">Eliminar</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('js')
    <script>
        $('#table-data').DataTable({
            "scrollX": true
        });
    </script>
@stop
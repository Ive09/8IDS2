@extends('adminlte::page')
@section('title', 'profesores')
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
        <h3 style="text-align: center;"> LISTA DE PROFESORES</h3>
    </div>
    <div>   
        <table class="table" id="table-data">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Horas Asignadas</th>
                    <th>Dias economicos correspondientes</th>
                    <th>Usuario</th>
                    <th>Puesto</th>
                    <th>Division</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profesores as $profesor)
                    <tr>
                        <td>{{$profesor['numero']}}</td>
                        <td>{{$profesor['nombre']}}</td>
                        <td>{{$profesor['horas_asignadas']}}</td>
                        <td>{{$profesor['dias_economicos_correspondientes']}}</td>
                        <td>{{$profesor['id_usuario']}}</td>
                        <td>{{$profesor->nombre_puesto}}</td>
                        <td>{{$profesor->division->nombre}}</td>
                        <td>
                            <a href="{{route('profesor.nueva',['id'=>$profesor['id'] ])}}" class="">
                                <span class="btn">Editar</span>
                            </a>
                            <form action="{{route('profesor.eliminar',['id'=>$profesor['id']])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{$profesor['id']}}">
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
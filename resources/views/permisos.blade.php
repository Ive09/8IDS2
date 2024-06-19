@extends('adminlte::page')
@section('title', 'permisos')
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
        <h3 style="text-align: center;" > LISTA DE PERMISOS</h3>
    </div>
    <div class="box">
        <div class="box-body">
            <table class="table">
                <thead class="text-center">
                    <tr>
                        <th class="table th">Profesor</th>
                        <th class="table th">Fecha</th>
                        <th class="table th">Motivo</th>
                        <th class="table th">Estado</th>
                        <th class="table th">Acciones</th>
                    </tr>
                </thead>
                    
                    @foreach ($permisos as $permiso)
                    <tr class="table td">
                        <td class="text-center">{{$permiso-> id_profesor}}</td>
                        <td>{{$permiso->fecha}}</td>
                        <td>{{$permiso->motivo}}</td>
                        <td>{{$permiso->estado}}</td>
                        <td>
                            <form method="POST" action="{{route('aprobar_permiso', $permiso->id)}}">
                            @csrf
                                
                                <button class="btn" class="center" type="submit">Autorizar</button>
                            </form>
                            <form method="POST" action="{{route('denegar_permiso', $permiso->id)}}">
                            @csrf
                            <button class="btn-1" type="submit">Rechazar</button>
                            <br/>
                                <input class="btn-2" type="text" name="observaciones" placeholder="Observaciones">
                                
                                
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
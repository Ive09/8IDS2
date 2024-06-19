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
    <div  class="header">
        <h3 style="text-align: center;"> LISTA DE PERMISOS</h3>
    </div>
    <div class="box">
        <div class="box-body">
            <table class="table" >
                <thead class="text-center">
                    <tr>
                        <th class="table th">Profesor</th>
                        <th class="table th">Fecha</th>
                        <th class="table th">Motivo</th>
                        <th class="table th">Estado</th>
                    </tr>
                </thead>
                    
                    @foreach ($permiso as $permisoos)
                    <tr>
                        <td class="text-center">{{$permisoos-> id_profesor}}</td>
                        <td>{{$permisoos->fecha}}</td>
                        <td>{{$permisoos->motivo}}</td>
                        <td>{{$permisoos->estado}}</td>
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
@extends('adminlte::page')
@section('title', 'Divisiones')
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
        <h3 style="text-align: center;"> LISTA DE DIVISIONES</h3>
    </div>
    <div >
        <table class="table" >
            
            <thead>
                <tr >
                    <th class="table th">Código</th>
                    <th class="table th" >Nombre</th>
                    <th class="table th">Opciones</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($divisiones as $division)
                    <tr class="table td">
                        
                        <td >{{$division['codigo']}}</td>
                        <td >{{$division['nombre']}}</td>
                        <td >
                            <a href="{{route('division.nueva',['id'=>$division['id'] ])}}" class="">
                                <span class="btn" >Editar</span>
                            </a>
                            <form action="{{route('division.eliminar',['id'=>$division['id']])}}" method="POST"> </br>
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{$division['id']}}">
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
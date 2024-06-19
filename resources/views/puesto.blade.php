@extends('adminlte::page')
@section('title', 'puesto')
@section('content_header')
<head>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/div.css') }}">
    <link rel="stylesheet" href="{{ asset('css/botones.css') }}">
</head>
    <h1 class="header">REGISTRO PUESTO</h1>
@stop

@section('content')
    <div class="container">
        <div class="mi-div">
            <form action="{{route('puesto.guardar')}}" method="POST">
                @csrf
                
                <input type="hidden" name="id" value="{{$puesto->id}}">
                <div class="mi-div">
                    <label for="codigo">Código</label>
                    <input type="text" value="{{$puesto->codigo}}" name="codigo" required>
                </div>
                <div class="mi-div">
                    <label for="nombre">Nombre:</label>
                    <input type="text" value="{{$puesto->nombre}}" name="nombre" required>
                </div>
</br>
                <button class="btn-3" type="submit">Guardar</button>
            </form>
        </div>
    </div>
@stop


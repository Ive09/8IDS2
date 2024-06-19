@extends('adminlte::page')
@section('title', 'profesor')
@section('content_header')
<head>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/div.css') }}">
    <link rel="stylesheet" href="{{ asset('css/botones.css') }}">
</head>
    <h1 class="header">PROFESOR</h1>
@stop

@section('content')
    <div class="container">
        <div class="mi-div">
            <form action="{{route('profesor.guardar')}}" method="POST">
                @csrf
                
                <input type="hidden" name="id" value="{{$profesor->id}}">
                <div class="mi-div">
                    <label for="codigo">Numero</label>
                    <input type="text" value="{{$profesor->numero}}" name="numero" required>
                </div>
                <div class="mi-div">
                    <label for="nombre">Nombre:</label>
                    <input type="text" value="{{$profesor->nombre}}" name="nombre" required>
                </div>
                <div class="mi-div">
                    <label for="horas_asignadas">Horas asignadas:</label>
                    <input type="number" value="{{$profesor->horas_asignadas}}" name="horas_asignadas" required>
                </div>
                <div class="mi-div">
                    <label for="dias_economicos_correspondientes">Dias economicos correspondientes:</label>
                    <input type="number" value="{{$profesor->dias_economicos_correspondientes}}" name="dias_economicos_correspondientes" required>
                </div>
                <div class="mi-div">
                    <label for="id_usuario">Usuario:</label>
                    <select name="id_usuario">
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mi-div">
                    <label for="id_puesto">Puesto:</label>
                    <select name="id_puesto" >
                        @foreach($puestos as $puesto)
                        <option value="{{$puesto->id}}">{{$puesto->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mi-div">
                    <label for="id_division">Division:</label>
                    <select name="id_division">
                        @foreach($divisiones as $division)
                        <option value="{{$division->id}}">{{$division->nombre}}</option>
                        @endforeach 
                    </select>
                </div>
</br>
                <button class="btn-3" type="submit">Guardar</button>
            </form>
        </div>
    </div>
@stop

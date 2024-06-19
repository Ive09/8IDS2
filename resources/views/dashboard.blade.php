@extends('layout')
@section('title','Dashboard')
@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
    <h1>BIENVENIDA {{$user->name}} AL DASHBOARD, Edad: {{$user->age}}</body>
@endsection

@extends('layout')
@section('title','login')
@section('content')
    <div >
        <form action="{{ route('login.validate')}}" method="post">
         @csrf   
            <div class="form-group">
                <label for="username">USUARIO:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">CONTRASEÑA:</label>
                <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" >ENVIAR</button>
    </form>
</div>
@endsection
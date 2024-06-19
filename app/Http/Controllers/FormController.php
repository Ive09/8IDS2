<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('form');
    }
    public function login(Request $req)
{
    $user = Form::where('username','=',$req->username)
        -> where('password', '=', $req->password)
        ->first();
    if($user)
    {
        return view('dashboard', compact('user'));
    }else
    {
        return "Datos inválidos!!!!";
    }
    //return $user; 

    return "USUARIO:" . $req->username . "CONTRASEÑA:". $req->password;
}
}

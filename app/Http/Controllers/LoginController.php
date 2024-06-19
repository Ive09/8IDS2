<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $req) {
        if(Auth::attempt((['email' => $req->email, 'password' =>$req->password]))) 
        {
         $user = Auth::user();
         $token =$user->createToken('app')->plainTextToken;
         $arr = array('acceso' => 'Ok', 'token'=> $token,'nombre'=> $user->name,'id_usuario'=> $user->id, 'error' => '');
         return json_encode($arr);
        }
        else
        {
         $arr = array('acceso' => '', 'token'=>'', 'error' => 'No existe el usuario o contraseña');
         return json_encode($arr);
        }
 
     }
}

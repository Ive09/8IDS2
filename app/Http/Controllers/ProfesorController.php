<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Profesor;
use App\Models\Puesto;
use App\Models\User;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function view(Request $req)
    {
        if($req->id == 0){
            $profesor = new Profesor();
        }
        else{
            $profesor = Profesor::find($req->id);
        }
        $users = User::all();
        $divisiones = Division::all();
        $puestos = Puesto::all();
        
        return view('profesor', compact('profesor', 'users','divisiones', 'puestos'));
        
    }
    public function store(Request $req)
{
    if($req->id == 0){
        $profesor = new Profesor();
    }
    else{
        $profesor = Profesor::find($req->id);
    }
    

    $profesor->numero = $req->numero;
    $profesor->nombre = $req->nombre;
    $profesor->horas_asignadas=  $req->horas_asignadas;
    $profesor->dias_economicos_correspondientes= $req->dias_economicos_correspondientes;
    $profesor->id_usuario=$req->id_usuario;
    $profesor->id_puesto=$req->id_puesto;
    $profesor->id_division= $req->id_division;


    $profesor->save();

    //return redirect()->to("home");
    return redirect()->route("profesores");
}
    public function index()
    {
        $profesores = Profesor::
            join('puesto','profesores.id_puesto','=','puesto.id')
            ->select('profesores.*','puesto.nombre as nombre_puesto')
            ->get();
        return view('profesores', compact('profesores'));
        
    }
    public function delete($id)
    {
        $profesor = Profesor::find($id);
        $profesor->delete();

        return redirect()->route("profesores");
    }
}

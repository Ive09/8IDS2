<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use App\Models\Profesor;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    public function store(Request $req)
    {
        if($req->id != 0)
        {
            $permiso = Permiso::find($req->id);
        }
        else
        {
            $profesor = Profesor::where('id_usuario',$req->id_usuario)->first();
            $permiso = new Permiso();
            $permiso -> estado = 'P';
            $permiso -> id_profesor = $profesor->id;
        }
        $permiso -> fecha = $req->fecha;
        
        $permiso -> motivo = $req->motivo;
        //$permiso -> observaciones = $req->observaciones;
        

        $permiso->save();

        return "OK";
    }

    public function list(Request $req)
    {
        $permisos = Permiso::join('profesores','profesores.id','=','permisos.id_profesor')
        ->where('profesores.id_usuario',$req->id_usuario)
        ->select('permisos.*','profesores.nombre as nombre_profesor')
        ->get();
        return $permisos;
    }

    public function autorizar(Request $req)
    {
        $permiso = Permiso::find($req->id);
        $permiso->estado = 'A';
        $permiso->observaciones = $req->observaciones;
        $permiso->save();
        return redirect()->route('pendientes');
    }
    
    public function rechazar(Request $req)
    {
        $req->validate([
            'observaciones' => 'required'
        ]);
        $permiso = Permiso::find($req->id);
        $permiso->estado = 'R';
        $permiso->observaciones = $req->observaciones;
        $permiso->save();
        return redirect()->route('pendientes');
    }
    
    
    public function PermisosPendientes(Request $req)
    {
        $permisos = Permiso::where('estado', 'P')->get();
        return view('permisos', compact('permisos'));
    }

    public function PermisosAutorizados(Request $req)
    {
        $permiso = Permiso::where('estado', 'A')->get();
        return view('permiso', compact('permiso'));
    }

    public function PermisosRechazados(Request $req)
    {
        $permiso = Permiso::where('estado', 'R')->get();
        return view('permiso', compact('permiso'));
    }




    public function index(Request $req)
    {
        $permisos = Permiso::find($req->id);
        return $permisos;
    }

    public function delete(Request $req)
    {
        $permiso = Permiso::find($req->id);
        $permiso->delete();
        return "Ok";
    }

}

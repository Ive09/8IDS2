<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    public function view(Request $req)
    {
        if($req->id == 0){
            $puesto = new Puesto();
        }
        else{
            $puesto = Puesto::find($req->id);
        }
        
        return view('puesto', compact('puesto'));
        
    }
    public function store(Request $req)
{
    if($req->id == 0){
        $puesto = new Puesto();
    }
    else{
        $puesto = Puesto::find($req->id);
    }
    

    $puesto->codigo = $req->codigo;
    $puesto->nombre = $req->nombre;
    
    $puesto->save();

    //return redirect()->to("home");
    return redirect()->route("puestos");
}
    public function index()
    {
        $puestos = Puesto::all();
        return view('puestos', compact('puestos'));
    }
    public function delete($id)
    {
        $puesto = Puesto::find($id);
        $puesto->delete();

        return redirect()->route("puestos");
    }
}

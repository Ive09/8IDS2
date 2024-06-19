<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;


class DivisionController extends Controller
{
    public function view(Request $req)
    {
        if($req->id == 0){
            $division = new Division();
        }
        else{
            $division = Division::find($req->id);
        }
        
        return view('division', compact('division'));
        
    }
    public function store(Request $req)
{
    if($req->id == 0){
        $division = new Division();
    }
    else{
        $division = Division::find($req->id);
    }
    

    $division->codigo = $req->codigo;
    $division->nombre = $req->nombre;
    
    $division->save();

    //return redirect()->to("home");
    return redirect()->route("divisiones");
}
    public function index()
    {
        $divisiones = Division::all();
        return view('divisiones', compact('divisiones'));
    }
    public function delete($id)
    {
        $division = Division::find($id);
        $division->delete();

        return redirect()->route("divisiones");
    }
}

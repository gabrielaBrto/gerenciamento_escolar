<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nivel;
use App\Http\Requests\NivelRequest;

class NivelController extends Controller
{
    //
    public function index()
    {
        $niveis = Nivel::all();
        return view('nivel/index',compact('niveis'));
    }
    public function create(){
        
        return view('nivel/form');
    }

    public function store(NivelRequest $request){
        $nivel = Nivel::create([
            'nome' => $request->nome,

        ]);

        return redirect('/nivel/form');
    }

    public function edit($id)
    {
        
        $nivel = Nivel::findOrFail($id);
        return view('nivel/form',compact('nivel'));
    }

    public function update(Request $request,$id)
    {   
        $nivel = Nivel::findOrFail($id);
        
        // $usuario->update([
        //     'nome' => $request->nome,
        //     'email' => $request->email,
        //     'data_nascimento' => $request->data_nascimento,
        //     'nivel_id' => $request->nivel_id
        // ]);

        $nivel->update($request->all());        
        return redirect('/nivel');
    }
}

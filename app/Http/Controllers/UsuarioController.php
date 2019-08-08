<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{Nivel, Usuario, Materia};
use DB;

use App\Http\Requests\UsuarioStoreRequest;
class UsuarioController extends Controller{

    public function index(){
        $usuarios = Usuario::all();
        $usuariosDeletados = Usuario::onlyTrashed()->get();

        return view('index', compact('usuarios','usuariosDeletados'));
    }

   

    public function create(){
        $niveis = Nivel::all();
        $materias = Materia::all();
        return view('form', compact('niveis','materias'));
    }

    public function store(UsuarioStoreRequest $request) {
        
        // Usuario::create([
        //     'nome' => $request->nome,
        //     'email' => $request->email,
        //     'data_nascimento' => $request->data_nascimento,
        //     'nivel_id' => $request->nivel_id
        // ]);
        DB::beginTransaction();
        try{

            /** 
             * $ususario->materias()->sync(
                * [
                *      1 => ['carga_horaria' => 20],
                *      2 => ['carga_horaria' => 25],
                * ]
             * );*/ 




            $usuario = Usuario::create($request->all());
            $usuario->materias()->sync($request->materias);
            DB::commit();
            return back()->with('success', 'Usuario Cadastrado com sucesso');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Erro no Servidor');

        }
        
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        $niveis = Nivel::all();
        return view('form',compact('usuario','niveis'));
    }

    public function update(Request $request,$id)
    {   
        $usuario = Usuario::findOrFail($id);
        
        // $usuario->update([
        //     'nome' => $request->nome,
        //     'email' => $request->email,
        //     'data_nascimento' => $request->data_nascimento,
        //     'nivel_id' => $request->nivel_id
        // ]);

        $usuario->update($request->all());        
        return redirect('/');
    }

    public function destroy($id){
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return back();
    }

    public function restore($id){
        $usuario = Usuario::onlyTrashed()->findOrFail($id);
        $usuario->restore();
        return back();
    }

    
}

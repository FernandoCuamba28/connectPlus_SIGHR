<?php

namespace App\Http\Controllers\api\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Contacto;
use App\Models\empresa\Departamento;
use App\Models\Empresa\Empresa;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $departamentos::departamentos::where('empresa_id',$user->empresa_id)->get();
        return response()->json(['departamentos'=>$departamentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $departamento = new Departamento();
        $departamento->nome=$request->nome;
        $departamento->sigla=$request->sigla;
        $departamento->empresa_id=$user->empresa_id;
        if($departamento->save()){
            return response()->json(['sucess'=>'ok']);
        }
        return response()->json(['Error'=>'aconteceu algum erro durante o cadastro']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empresa\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {   
        //query que retorna departamentos por empresa
        return response()->json(['departamentos'=>$departamentos]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empresa\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {
        return response()->json(['departamento'=>$departamento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empresa\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departamento $departamento)
    {
        $empresa_id= new Empresa();
        $user = auth('sanctum')->user();

        $departamento->nome=$request->nome;
        $departamento->sigla=$request->sigla;
        try {
            //Metodo responsavel por actualizar a Emmpresa
            $departamento->save();
            return response()->json(['Sucess'=>'actualizado com sucesso']);
        } catch (Throwable $e) {
            report($e);

            return false;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empresa\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
    }
}

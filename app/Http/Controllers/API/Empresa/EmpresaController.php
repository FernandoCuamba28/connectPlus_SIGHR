<?php

namespace App\Http\Controllers\api\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Empresa\Empresa;
use App\Models\Contacto;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inscricao->periodo_id=$request->idperiodo;
        //metodo para insercao de Empresa
        $empresa = new Empresa();
        $contacto = new Contacto();

        $empresa->nome=$request->nome;
        $empresa->email=$request->email;
        $empresa->endereco=$request->endereco;
        $empresa->nuit=$request->nuit;
        $empresa->contribuente=$request->contribuente;
        $empresa->area=$request->area;

        $contacto->numero=$request->contacto;
        $contacto->tipo='empresarial';
       

        //verifica se a empresa foi cadastrada para poder gravar o contacto
        if ($empresa->save())
        {
            $empresa->empresa_id=$empresa->id;
            $contacto->save();
            return response()->json(['success'=>'Empresa cadastrada.']);
        } else
        {
            return response()->json(['error'=>'aconteceu algum erro']);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}

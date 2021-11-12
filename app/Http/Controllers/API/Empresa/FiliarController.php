<?php

namespace App\Http\Controllers\api\Empresa;

use App\Http\Controllers\Controller;
use App\Models\empresa\Filiar;
use Illuminate\Http\Request;

class FiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->empresa_id;
         $filiais= Filiar::where('empresa_id',$user )->get();
        return response()->json(['filiais'=>$filiais]);
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
        $filiar = new Filiar();
        $filiar->nome=$request->nome;
        $filiar->enderreco=$request->enderreco;
        $filiar->empresa_id=$user->empresa_id;

        if($filiar->save()){
            return response()->json(['sucess'=>'ok']);
        }
        return response()->json(['Error'=>'aconteceu algum erro durante o cadastro']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empresa\Filiar  $filiar
     * @return \Illuminate\Http\Response
     */
    public function show(Filiar $filiar)
    {
        return response()->json(['filiar'=>$filiar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empresa\Filiar  $filiar
     * @return \Illuminate\Http\Response
     */
    public function edit(Filiar $filiar)
    {
        return response()->json(['departamento'=>$departamento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empresa\Filiar  $filiar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filiar $filiar)
    {
        $empresa_id= new Empresa();
        $user = auth('sanctum')->user();

        $filiar->nome=$request->nome;
        $filiar->enderreco=$request->enderreco;
        try {
            //Metodo responsavel por actualizar a Emmpresa
            $enderreco->save();
            return response()->json(['Sucess'=>'actualizado com sucesso']);
        } catch (Throwable $e) {
            report($e);

            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empresa\Filiar  $filiar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filiar $filiar)
    {
        $$filiar->delete();
    }
}

<?php

namespace App\Http\Controllers\api\Empresa;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\Controller;
use App\Models\Empresa\Empresa;
use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user = auth()->user()->empresa_id;
         $empresa= Empresa::where('id',$user )->first();
        return response()->json(['empresa'=>$empresa]);
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
<<<<<<< HEAD
=======

>>>>>>> 6b7fc4cc27f7e18cfe18259ff25e3a0df22c2e9d
        //metodo para insercao de Empresa
        //o codigo abaixo, faz a invocacao do metodo register controller, responsavel pelo cadastro de Utilizadores
        $registerController = new RegisterController;

        $empresa = new Empresa();
        $contacto = new Contacto();

        $empresa->nome=$request->nome;
<<<<<<< HEAD
        $empresa->email=$request->emailempresarial;
=======
        $empresa->email=$request->email;
>>>>>>> 6b7fc4cc27f7e18cfe18259ff25e3a0df22c2e9d
        $empresa->endereco=$request->enderreco;
        $empresa->nuit=$request->nuit;
        $empresa->contribuente=$request->contribuente;
        $empresa->area=$request->area;
        $contacto->numero=$request->contacto;
        $contacto->tipo='empresarial';
<<<<<<< HEAD
=======

>>>>>>> 6b7fc4cc27f7e18cfe18259ff25e3a0df22c2e9d

        //verifica se a empresa foi cadastrada para poder gravar o contacto
        if ($empresa->save())
        {
            $contacto->empresa_id=$empresa->id;
        //se a empresa for cadastrada, o metodo ira persistir o contacto
<<<<<<< HEAD
                if($contacto->save()){
                    return $registerController->register($request,$empresa->id);
                }


=======
            $contacto->save();
            return response()->json(['id'=>$empresa->id]);
>>>>>>> 6b7fc4cc27f7e18cfe18259ff25e3a0df22c2e9d
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
<<<<<<< HEAD
        
=======
>>>>>>> 6b7fc4cc27f7e18cfe18259ff25e3a0df22c2e9d
        return response()->json(['empresa'=>$empresa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //Metodo responsavel por retornar a empresa para posterior edicao
        return response()->json(['empresa'=>$empresa]);
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
        $empresa->nome=$request->nome;
        $empresa->email=$request->email;
        $empresa->endereco=$request->enderreco;
        $empresa->nuit=$request->nuit;
        $empresa->contribuente=$request->contribuente;
        $empresa->area=$request->area;

        try {
<<<<<<< HEAD
            //Metodo responsavel por actualizar a Empresa
=======
            //Metodo responsavel por actualizar a Emmpresa
>>>>>>> 6b7fc4cc27f7e18cfe18259ff25e3a0df22c2e9d
             $empresa->save();
            return response()->json(['Sucess'=>'actualizado com sucesso']);
        } catch (Throwable $e) {
            report($e);

            return false;
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();


    }
}

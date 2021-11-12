<?php

namespace App\Http\Controllers\API;

<<<<<<< HEAD
use App\Models\Contacto;
use App\Models\Empresa\Empresa;
=======
>>>>>>> 6b7fc4cc27f7e18cfe18259ff25e3a0df22c2e9d
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    //metodo que faz o registo do utilizador e da empresa em Simultaneo
    public function register($request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'empresa_id' => '',


        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();

        $input['empresa_id'] = $id;
        $input['password'] = bcrypt($input['password']);
        $input['empresa_id'] = 1;
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;

            return $this->sendResponse($success, 'User login successfully.');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
<<<<<<< HEAD
    }


    public function store(Request $request)
    {
        //metodo para insercao de Empresa
        $empresa = new Empresa();
        $contacto = new Contacto();
        $empresa->nome=$request->nome;
        $empresa->email=$request->emailempresarial;
        $empresa->endereco=$request->enderreco;
        $empresa->nuit=$request->nuit;
        $empresa->contribuente=$request->contribuente;
        $empresa->area=$request->area;

        $contacto->numero=$request->contacto;
        $contacto->tipo='empresarial';


        //verifica se a empresa foi cadastrada para poder gravar o contacto
        if ($empresa->save())
        {
            $contacto->empresa_id=$empresa->id;
            //se a empresa for cadastrada, o metodo ira persistir o contacto
            $contacto->save();

            $this->register($request,$empresa->id);

          //  return response()->json(['id'=>$empresa->id]);
        } else
        {
            return response()->json(['error'=>'aconteceu algum erro']);
        }


=======
>>>>>>> 6b7fc4cc27f7e18cfe18259ff25e3a0df22c2e9d
    }
}

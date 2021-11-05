<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class AutenticationController extends Controller
{
    public function sendPasswordResetToken(Request $request)
    {
    	/*$rules = 
        ["email"=>"required|email|exists:users,email",
    ];
     $Validator = Validator::make($request->all(), $rules);

        if($Validator->fails()){
            return $this->errorMessage(true, $Validator->erros()->all());
        }
        $data = $Validator->validated();

        $user =User::where('email', $data["email"])->first();*/

        $user =User::where('email','fernandocuamba28@gmail.com')->first();

        $reset_link_set = $user->sendResetLink();
            if($reset_link_sent)
            {
                return $this->erroMessage(false,"A password reset Token");
            }
            return $this->erroMessage(true, $user->getErroMessage());

            do{
                $token=$this->genResetCode();
                $signature =hash('md5',$token);
                $exists = $this->where([
                ["user_id",$user->id],
                ["token_signature",$signature]
                
                ])->exists();
            
            }   while($exists);


            try{
                $user->notify(new APIPasswordResetNotification($token));
                    return $this->create([
                        "user_id" => $user->id,
                         "token_signature" => $signature,
                         "expires_at" => Carbon::now()->addMinutes(30),
        
                    ]);

            } catch (Throwable $th){
                $this->error_message = $th->getMessage();
                return false;
            }
        
    }
    


  
    
}




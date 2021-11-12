<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ForgotPasswordController;
use App\Http\Controllers\API\ResetPasswordController;
use App\Http\Controllers\API\AutenticationController;
use App\Http\Controllers\API\PasswordResetRequestController;
use App\Http\Controllers\API\ChangePasswordController;
use App\Http\Controllers\API\Empresa\EmpresaController;
<<<<<<< HEAD
use App\Http\Controllers\API\Empresa\DepartamentoController;
use App\Http\Controllers\API\Empresa\FiliarController;
=======
>>>>>>> 6b7fc4cc27f7e18cfe18259ff25e3a0df22c2e9d
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('/', function () {
    //return Response::json('ok');
    return response()->json(['teste' => 'Fernando', 'Fernando 1' => 'CA']);
});

//Rotas da tela login
Route::get('register', [RegisterController::class, 'register'])->name('register');;

//Route::post('register/{request}/{id}', [RegisterController::class, 'register'])->name('register');

Route::post('login', [RegisterController::class, 'login']);

Route::post('reset-password', [PasswordResetRequestController::class, 'sendPasswordResetEmail'])->name('api-reset-password');

Route::post('change-password', [ChangePasswordController::class, 'passwordResetProcess'])->name('api-reset-password-token');

//Rotas para a Gestao de empresas
Route::resource('empresa', EmpresaController::class);



<<<<<<< HEAD
Route::group(['middleware'=>['auth:sanctum']],function(){
   
//Rotas para a Gestao de departamentos
Route::resource('departamento', DepartamentoController::class);

//Rotas para a Gestao de Filiais
Route::resource('filiar', FiliarController::class);

});
=======
Route::resource('empresa', EmpresaController::class);

>>>>>>> 6b7fc4cc27f7e18cfe18259ff25e3a0df22c2e9d


























Route::middleware('auth:sanctum')->group(function () {

});


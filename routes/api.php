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
Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [RegisterController::class, 'login']);

Route::post('reset-password', [PasswordResetRequestController::class, 'sendPasswordResetEmail'])->name('api-reset-password');

Route::post('change-password', [ChangePasswordController::class, 'passwordResetProcess'])->name('api-reset-password-token');

//Rotas para a Gestao de empresas


Route::resource('empresa', EmpresaController::class);



























Route::middleware('auth:sanctum')->group(function () {

});


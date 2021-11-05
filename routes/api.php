<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;

use App\Http\Controllers\API\ForgotPasswordController;
use App\Http\Controllers\API\ResetPasswordController;
use App\Http\Controllers\API\AutenticationController;
use App\Http\Controllers\API\PasswordResetRequestController;
use App\Http\Controllers\API\ChangePasswordController;
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


Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [RegisterController::class, 'login']);

//Route::post('password/forgot-password', [ForgotPasswordController::class, 'sendResetLinkResponse'])->name('passwords.sent');

//Route::post('password/reset', [ResetPasswordController::class, 'sendResetResponse'])->name('passwords.reset');
     
//Route::post('new-password', [AutenticationController::class, 'setNewAccountPassword'])->name('new-account-password');
//Route::post('reset-password-token', [AutenticationController::class, 'resetPassword'])->name('api-reset-password-token');
//Route::post('forgot-password', [AutenticationController::class, 'sendPasswordResetToken'])->name('api-reset-password');





Route::post('reset-password-token', [PasswordResetRequestController::class, 'sendPasswordResetEmail'])->name('api-reset-password-token');

Route::post('change-password', [ChangePasswordController::class, 'passwordResetProcess'])->name('api-reset-password-token');




Route::middleware('auth:sanctum')->group(function () {
    Route::resource('products', ProductController::class);
});


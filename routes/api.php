<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [App\Http\Controllers\Api\AppController::class, 'onLine']);


Route::post('/apiregister', [App\Http\Controllers\Api\AppController::class, 'apiRegister'])->name('api.register');
Route::post('/apilogin', [App\Http\Controllers\Api\AppController::class, 'apiLogin'])->name('api.login');
Route::post('/apilogout', [App\Http\Controllers\Api\AppController::class, 'apiLogout'])->name('api.logout');
Route::post('/getuser', [App\Http\Controllers\Api\AppController::class, 'getUser'])->name('api.user');

Route::middleware('auth:api')->group(function(){
  Route::post('/getlines', [App\Http\Controllers\Api\AppController::class, 'getLineas']);
  Route::post('/getline', [App\Http\Controllers\Api\AppController::class, 'getLine']);

  Route::post('/getzonas', [App\Http\Controllers\Api\AppController::class, 'getZonas']);
  // Route::post('/getjugadores', [App\Http\Controllers\Api\AppController::class, 'getJugadores']);
  // Route::post('/getdata', [App\Http\Controllers\Api\AppController::class, 'getData']);
  // Route::post('/getcartas', [App\Http\Controllers\Api\AppController::class, 'getCartas']);
  // Route::post('/save', [App\Http\Controllers\Api\AppController::class, 'saveGame']);
  // Route::post('/games', [App\Http\Controllers\Api\AppController::class, 'getGames']);
});



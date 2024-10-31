<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/online', [App\Http\Controllers\HomeController::class, 'onLine'])->name('online');

Route::prefix('admin')->group(function(){
  Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
  
});

Route::prefix('colores')->group(function(){
  Route::get('/', [App\Http\Controllers\AdminController::class, 'colores'])->name('admin.colores');
  Route::post('/coloresListJSON', [App\Http\Controllers\AdminController::class, 'coloresListJSON'])->name('admin.coloresListJSON');
  Route::get('/edit-color/{id}', [App\Http\Controllers\AdminController::class, 'editColor'])->name('admin.edit-color');
  Route::post('/save-color', [App\Http\Controllers\AdminController::class, 'saveColor'])->name('admin.saveColor');

  
});

Route::prefix('ligas')->group(function(){
  Route::get('/', [App\Http\Controllers\AdminController::class, 'ligas'])->name('admin.ligas');
  
   Route::post('/ligasListJSON', [App\Http\Controllers\AdminController::class, 'ligasListJSON'])->name('admin.ligasListJSON');
   Route::get('/edit-liga/{id?}', [App\Http\Controllers\AdminController::class, 'editLiga'])->name('admin.edit-liga');
  Route::post('/save-liga', [App\Http\Controllers\AdminController::class, 'saveLiga'])->name('admin.saveLiga');
});


Route::prefix('equipos')->group(function(){
  Route::get('/{liga_id}', [App\Http\Controllers\AdminController::class, 'equipos'])->name('admin.equipos');
  
  Route::post('/equiposListJSON', [App\Http\Controllers\AdminController::class, 'equiposListJSON'])->name('admin.equiposListJSON');
  Route::get('/equipo/edit/{liga_id}/{id?}', [App\Http\Controllers\AdminController::class, 'editEquipo'])->name('admin.edit-equipo');
  Route::post('/save-equipo', [App\Http\Controllers\AdminController::class, 'saveEquipo'])->name('admin.saveEquipo');
  Route::post('/delete-equipo', [App\Http\Controllers\AdminController::class, 'deleteEquipo'])->name('admin.deleteEquipo');
});

Route::prefix('main')->group(function(){
  Route::post('set-system', [App\Http\Controllers\MainController::class, 'setSystem'])->name('main.set-system');
  Route::post('new-temporada', [App\Http\Controllers\MainController::class, 'newTemporada'])->name('main.new-temporada');
  Route::post('sorteo', [App\Http\Controllers\CopaController::class, 'newFase'])->name('main.sorteo');

});

Route::prefix('home')->group(function(){
   Route::get('inicio', [App\Http\Controllers\HomeController::class, 'inicio'])->name('home.inicio');
   Route::get('system', [App\Http\Controllers\HomeController::class, 'system'])->name('home.system');
   

   Route::get('ligas', [App\Http\Controllers\LigaController::class, 'index'])->name('home.ligas');
   Route::get('equipos/{liga_id}', [App\Http\Controllers\LigaController::class, 'equipos'])->name('home.equipos');

   
});







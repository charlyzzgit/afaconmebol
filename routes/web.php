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

Route::get('/{grupo_id?}', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/online', [App\Http\Controllers\HomeController::class, 'onLine'])->name('online');

Route::prefix('admin')->group(function(){
  Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
  
});

Route::prefix('admin/colores')->group(function(){
  Route::get('/', [App\Http\Controllers\AdminController::class, 'colores'])->name('admin.colores');
  Route::post('/coloresListJSON', [App\Http\Controllers\AdminController::class, 'coloresListJSON'])->name('admin.coloresListJSON');
  Route::get('/edit-color/{id}', [App\Http\Controllers\AdminController::class, 'editColor'])->name('admin.edit-color');
  Route::post('/save-color', [App\Http\Controllers\AdminController::class, 'saveColor'])->name('admin.saveColor');

  
});

Route::prefix('admin/ligas')->group(function(){
  Route::get('/', [App\Http\Controllers\AdminController::class, 'ligas'])->name('admin.ligas');
  
   Route::post('/ligasListJSON', [App\Http\Controllers\AdminController::class, 'ligasListJSON'])->name('admin.ligasListJSON');
   Route::get('/edit-liga/{id?}', [App\Http\Controllers\AdminController::class, 'editLiga'])->name('admin.edit-liga');
  Route::post('/save-liga', [App\Http\Controllers\AdminController::class, 'saveLiga'])->name('admin.saveLiga');
});


Route::prefix('admin/equipos')->group(function(){
  Route::get('/{liga_id}', [App\Http\Controllers\AdminController::class, 'equipos'])->name('admin.equipos');
  
  Route::post('/equiposListJSON', [App\Http\Controllers\AdminController::class, 'equiposListJSON'])->name('admin.equiposListJSON');
  Route::get('/equipo/edit/{liga_id}/{id?}', [App\Http\Controllers\AdminController::class, 'editEquipo'])->name('admin.edit-equipo');
  Route::post('/save-equipo', [App\Http\Controllers\AdminController::class, 'saveEquipo'])->name('admin.saveEquipo');
  Route::post('/delete-equipo', [App\Http\Controllers\AdminController::class, 'deleteEquipo'])->name('admin.deleteEquipo');
});

Route::prefix('admin/commands')->group(function(){
  Route::get('/', [App\Http\Controllers\AdminController::class, 'commands'])->name('admin.commands');
  Route::post('/commandsJSON', [App\Http\Controllers\AdminController::class, 'commandsJSON'])->name('admin.commandsListJSON');
  Route::post('/procesar-lote', [App\Http\Controllers\AdminController::class, 'procesarLote'])->name('admin.procesar-lote');
  Route::post('/reset-lotes', [App\Http\Controllers\AdminController::class, 'resetLotes'])->name('admin.reset-lotes');
  Route::post('/reset-all', [App\Http\Controllers\AdminController::class, 'resetAll'])->name('admin.reset-all');

});

Route::prefix('main')->group(function(){
  Route::post('set-system', [App\Http\Controllers\MainController::class, 'setSystem'])->name('main.set-system');
  Route::post('new-temporada', [App\Http\Controllers\MainController::class, 'newTemporada'])->name('main.new-temporada');
  Route::post('sorteo', [App\Http\Controllers\CopaController::class, 'newFase'])->name('main.sorteo');
  Route::post('init-fecha', [App\Http\Controllers\MainController::class, 'initFecha'])->name('main.init-fecha');
  Route::post('save-partido', [App\Http\Controllers\CopaController::class, 'savePartido'])->name('main.save-partido');
  Route::post('fin-temporada', [App\Http\Controllers\MainController::class, 'finTemporada'])->name('main.fin-temporada');

  


});

Route::prefix('home')->group(function(){
   Route::get('inicio', [App\Http\Controllers\HomeController::class, 'inicio'])->name('home.inicio');
   Route::get('system', [App\Http\Controllers\HomeController::class, 'system'])->name('home.system');
   

   Route::get('ligas', [App\Http\Controllers\LigaController::class, 'index'])->name('home.ligas');
   Route::get('equipos/{liga_id}', [App\Http\Controllers\LigaController::class, 'equipos'])->name('home.equipos');

   Route::get('campeones', [App\Http\Controllers\GrupoController::class, 'campeones'])->name('home.campeones');
   Route::post('campeones-anio', [App\Http\Controllers\GrupoController::class, 'campeonesJSON'])->name('home.campeones-anio');

   Route::get('copa/{copa_zona}/{fase}/{id?}', [App\Http\Controllers\CopaController::class, 'index'])->name('home.copa');
   Route::get('partidos/{copa_zona}/{fase}/{grupo_id?}', [App\Http\Controllers\PartidoController::class, 'index'])->name('home.partidos');
   Route::get('estadio/{partido_id}', [App\Http\Controllers\PartidoController::class, 'estadio'])->name('home.estadio');
   Route::get('partidos-equipo-grupo/{equipo_id}/{grupo_id?}', [App\Http\Controllers\PartidoController::class, 'partidosEquipoGrupo'])->name('home.partidos-equipo-grupo');

   Route::get('goleadores/{copa}/{zona?}', [App\Http\Controllers\GoleadoresController::class, 'index'])->name('home.goleadores');

   Route::get('general/{copa_zona}/{fase}/{grupo_id?}', [App\Http\Controllers\CopaController::class, 'index'])->name('home.tabla-general');

   Route::get('anual', [App\Http\Controllers\GrupoController::class, 'getTablaAnual'])->name('home.tabla-anual');

   Route::get('candidatos/{copa}/{zona?}', [App\Http\Controllers\GrupoController::class, 'candidatos'])->name('home.candidatos');

   Route::get('en-competencia/{copa}/{zona?}', [App\Http\Controllers\GrupoController::class, 'enCompetencia'])->name('home.en-competencia');


   Route::get('clasificados', [App\Http\Controllers\GrupoController::class, 'clasificadosAfa'])->name('home.clasificados-afa');

   Route::get('estadisticas/{copa}/{zona?}', [App\Http\Controllers\GrupoController::class, 'estadisticas'])->name('home.estadisitcas');

   Route::get('estadisticas-partidos/{copa_zona}/{filter}/{id?}', [App\Http\Controllers\PartidoController::class, 'estadisticas'])->name('home.estadisitcas-partidos');
   Route::get('estadisticas-equipos/{copa}/{filter}/{zona?}', [App\Http\Controllers\GrupoController::class, 'estadisticasEquipos'])->name('home.estadisitcas-equipos');

   Route::get('estadisticas-goleadores/{copa}/{zona?}', [App\Http\Controllers\GoleadoresController::class, 'estadisticas'])->name('home.estadisitcas-goleadores');

   Route::get('calendar', [App\Http\Controllers\MainController::class, 'calendar'])->name('home.calendar');

   Route::get('historial/{copa}/{zona?}', [App\Http\Controllers\GrupoController::class, 'historial'])->name('home.historial');
   
   Route::post('historialJSON', [App\Http\Controllers\GrupoController::class, 'historialJSON'])->name('home.historialJSON');

   Route::get('estadisticas-historial/{anio}/{copa}/{zona?}', [App\Http\Controllers\GrupoController::class, 'estadisticasHistorial'])->name('home.estadisticas-historial');
   

   Route::get('estadisticas-partidos-historial/{anio}/{copa_zona}/{filter}/{id?}', [App\Http\Controllers\PartidoController::class, 'estadisticasHistorial'])->name('home.estadisitcas-partidos-historial');

   Route::get('estadisticas-equipos-historial/{anio}/{copa}/{filter}/{zona?}', [App\Http\Controllers\GrupoController::class, 'estadisticasEquiposHistorial'])->name('home.estadisitcas-equipos-historial');

   Route::get('estadisticas-goleadores-historial/{anio}/{copa}/{zona?}', [App\Http\Controllers\GoleadoresController::class, 'estadisticasHistorial'])->name('home.estadisitcas-goleadores-historial');

   Route::get('equipo/{id}', [App\Http\Controllers\LigaController::class, 'equipo'])->name('home.equipo');
   Route::get('historial-equipo/{id}/{copa}/{zona?}', [App\Http\Controllers\GrupoController::class, 'historialEquipo'])->name('home.historial-equipo');

   Route::get('vs/{equipo_id}/{vs_id}/{copa}', [App\Http\Controllers\PartidoController::class, 'vs'])->name('home.vs');
});







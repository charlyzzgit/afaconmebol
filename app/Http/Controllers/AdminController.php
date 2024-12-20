<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Liga;
use App\Models\Equipo;
use App\Models\AutoPartido;



class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        return view('admin.index');
    }

    // *****************************************COLORES*************************************

    public function colores(){
      return view('colores.index');
    }

    public function coloresListJSON(Request $request){
      $colores = Color::select(
                                'id',
                                'name',
                                'rgb',
                                'a',
                                'b',
                                'is_combinado',
                                'similares'
                              );
      if($request->is_combinado){
        $colores = $colores->where('is_combinado', $request->is_combinado == 'si' ? 1 : 0);
      }
      return getQueryTable($colores, $request, function($q){
        return [
          'id' => $q->id,
          'name' => $q->name,
          'rgb' => $q->rgb,
          'a' => $q->a,
          'b' => $q->b,
          'is_combinado' => $q->is_combinado,
          'similares' => $q->similares ? Color::whereIn('id', json_decode($q->similares))->get()->toArray() : []
        ];
      });

    }

    public function editColor($id){
      $color = Color::find($id);
      $ids = $color->similares ? json_decode($color->similares) : [];
      $similares = Color::whereIn('id', $ids)->where('id', '<>', $id)->get();
      $colores = Color::whereNotIn('id', $ids)->where('id', '<>', $id)->get();
      $all_colores = Color::get();
      return view('colores.modal-edit', compact('color', 'similares', 'colores', 'all_colores'));
    }

    public function saveColor(Request $request){
      //dd($request->all());
      return processTransaction(function() use($request){
        $color = Color::find($request->id);
        $color->is_combinado = $request->filled('is_combinado');
        if($request->a){
          $c = Color::find($request->a);
          $color->a = $c->rgb;
        }
        if($request->b){
          $c = Color::find($request->b);
          $color->b = $c->rgb;
        }

        $color->similares = $request->similares;

        $color->save();
        
      }, 'Color guardado con éxito', 'Error al guardar: ');
    }


    // *****************************************************LIGAS*****************************************

    public function ligas(){
      return view('ligas.index');
    }

    public function ligasListJSON(Request $request){
      $ligas = Liga::with('colorA', 'colorB', 'colorC')
                   ->select(
                            'ligas.id', 
                            'ligas.name', 
                            'ligas.bandera',
                            'ligas.a',
                            'ligas.b',
                            'ligas.c'
                          );

      $ligas = $ligas->orderBy($request->sort, $request->order);
     
      return getQueryTable($ligas, $request);
    }

    public function editLiga($id = null){
      $colores = Color::get();
      $liga = $id ? Liga::find($id) : null;
      return view('ligas.modal-edit', compact('colores', 'liga'));
    }

    public function saveLiga(Request $request){
      //dd($request->all());
      return processTransaction(function() use($request){
        $liga = $request->id ? Liga::find($request->id) : new Liga();
        $liga->name = $request->name;
        if($request->bandera){
          $source = 'ligas/'.$request->name.'/bandera';
          $liga->bandera = getUrlFile($request->bandera, $source);
        }
        $liga->a = $request->a;
        $liga->b = $request->b;
        $liga->c = $request->c;
        $liga->save();

      }, 'Liga guardada con éxito', 'Error al guardar: ');
    }




    // *****************************************************EQUIPOS*****************************************

    public function equipos($liga_id){
      $liga = Liga::select(
                            'ligas.id', 
                            'ligas.name', 
                            'ligas.bandera',
                            'ca.rgb as a',
                            'cb.rgb as b',
                            'cc.rgb as c'
                           )
                            ->leftJoin('colores as ca' , 'ligas.a', 'ca.id')
                            ->leftJoin('colores as cb' , 'ligas.b', 'cb.id')
                            ->leftJoin('colores as cc' , 'ligas.c', 'cc.id')
                            ->find($liga_id);
      return view('equipos.index', compact('liga'));
    }

    public function equiposListJSON(Request $request){
      $equipos = Equipo::select(
                            'equipos.id',
                            'equipos.liga_id',
                            'equipos.liga',
                            'equipos.name',
                            'ca.rgb as a',
                            'cb.rgb as b',
                            'cc.rgb as c',
                            'combinado.rgb as combinado',
                            'combinado.a as ca',
                            'combinado.b as cb',
                            'combinado.is_combinado as is_combinado',

                            'alternativo.rgb as alternativo',
                            'alternativo.a as aa',
                            'alternativo.b as ab',
                            'alternativo.is_combinado as is_combinado_alternativo',

                            'equipos.directory',
                            'equipos.clasico_id',
                            'equipos.directory',
                            'equipos.cesped',
                            'equipos.estructura',
                            'equipos.orden',
                            'equipos.nivel'
                           )
                            ->leftJoin('colores as ca' , 'equipos.a', 'ca.id')
                            ->leftJoin('colores as cb' , 'equipos.b', 'cb.id')
                            ->leftJoin('colores as cc' , 'equipos.c', 'cc.id')
                            ->leftJoin('colores as combinado' , 'equipos.combinado', 'combinado.id')
                            ->leftJoin('colores as alternativo' , 'equipos.alternativo', 'alternativo.id')
                            ->where('equipos.liga_id', $request->liga_id);

      if($request->id){
        $equipos = $equipos->where('equipos.id', $request->id);
      }

      //sql($equipos);
      $equipos = $equipos->orderBy($request->sort, $request->order);

      return getQueryTable($equipos, $request);
    }

    public function editEquipo($liga_id, $id = null){
      
      $colores = Color::get();
      $clasicos = Equipo::select('id', 'name')->where('liga_id', $liga_id);
      if($id){
        $clasicos = $clasicos->where('id', '<>', $id);
      }
      $clasicos = $clasicos->get();
      $equipo = $id ? Equipo::find($id) : null;
      return view('equipos.modal-edit', compact('colores', 'liga_id', 'equipo', 'clasicos'));
    }

    public function saveEquipo(Request $request){
      //dd($request->all());
      return processTransaction(function() use($request){
        $liga = Liga::find($request->liga_id);
        $directory = 'ligas/'.$liga->name.'/equipos/'.getName($request->name).'/';
        $equipo = $request->id ? Equipo::find($request->id) : new Equipo();
        $equipo->liga_id = $liga->id;
        $equipo->name = $request->name;
        $equipo->liga = $liga->name;
        $equipo->a = $request->a;
        $equipo->b = $request->b;
        $equipo->c = $request->c;
        $equipo->combinado = $request->combinado;
        $equipo->alternativo = $request->alternativo;
        $equipo->directory = $directory;
        $equipo->clasico_id = $request->clasico_id;
        $equipo->estructura = $request->estructura;
        $equipo->cesped = $request->cesped;
        $equipo->nivel = $request->nivel;

        if($request->escudo){
          $source = $directory.'escudo';
          getUrlFile($request->escudo, $source);
        }

        if($request->local){
          $source = $directory.'local';
          getUrlFile($request->local, $source);
        }

        if($request->visitante){
          $source = $directory.'visitante';
          getUrlFile($request->visitante, $source);
        }

        if($request->estadio){
          $source = $directory.'estadio';
          getUrlFile($request->estadio, $source);
        }
            
        
        if($request->bandera){
          $source = $directory.'bandera';
          getUrlFile($request->bandera, $source);
        }
        
        $equipo->save();

        return ['id' => $equipo->id];

      }, 'Equipo guardado con éxito', 'Error al guardar: ');
    }

    public function deleteEquipo(Request $request){
      return processTransaction(function() use($request){
          $equipo = Equipo::find($request->id);
          deleteDir('ligas\/'.$equipo->liga.'\equipos\/'.$equipo->directory);
          $equipo->delete();
      }, 'Equipo eliminado con éxito', 'Error al eliminar');
    }


    public function commands(){
      return view('commands.index');
    }

    public function commandsJSON(Request $request){
      $commands = AutoPartido::orderBy('index');

      return getQueryTable($commands, $request);
    }


    public function procesarLote(Request $request){
      return processTransaction(function() use($request){
        $ap = AutoPartido::find($request->id);
        // Capturar la salida del comando
        ob_start();
        Artisan::call('autopartido:run', ['lote' => $ap->index]);
        $output = ob_get_clean();
        $data = json_decode($output, false);
        if($data->status){
          $ap->update(['processed' => true]);
        }

        return json_decode($output);
      }, 'Procesado con éxito', 'Error al procesar');
    }
    
}

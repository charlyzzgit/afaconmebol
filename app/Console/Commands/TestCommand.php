<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GrupoController;
use App\Classes\Admin;
use App\Classes\AutoPartido;
use App\Classes\Sorteo;
use DB;
use \Carbon\Carbon;


class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'test:run {lat} {lng}';
    protected $signature = 'test:run';

    

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       //$eqs = (new GrupoController())->getTablaGeneralFase('afa', -2);
       //dd($eqs->toArray());
      //$this->updateStateGrupos('libertadores', 0);

      $s = new Sorteo('afa', 5);
      dd($s->sortear());
      //dd(getHorarioAfa(16));
      // $p = \App\Models\Partido::with('grupo.equiposPosition')->find(256);
      // $p->local = \App\Models\Equipo::find($p->loc_id);
      // $p->visitante = \App\Models\Equipo::find($p->vis_id);
      // $ap = new AutoPartido($p);

      // $ap->jugar();
    }

    private function updateStateGrupos($copa, $fase){
      try{
         DB::beginTransaction();
         $ids = \App\Models\Grupo::where('copa', $copa)->where('fase', $fase)->get()->pluck('id');

         foreach($ids as $id){
           (new GrupoController())->setEstadoClasificacion($id);
         }

         DB::commit();
         dd('ok');
      }catch(\Exception $e){
         DB::rollback();
         dd($e->getMessage());
      }
      

    }

    private function fondos(){
      $directory = public_path('resources/fondos');
        
        // Obtener todas las imágenes del directorio
        $images = glob($directory . "/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
        
        // Obtener solo los nombres de los archivos, no la ruta completa
        $images = array_map('basename', $images);
        dd($images);
    }

    private function cloneTable($original){
      $new_table = 'back_'.$original;
        DB::statement("CREATE TABLE `{$new_table}` LIKE `{$original}`");
        DB::statement("INSERT INTO `{$new_table}` SELECT * FROM `{$original}`");
    }

    public function inicarFecha(){
      $r = processTransaction(function(){
            $calendar = getCalendar(); //Calendar::find($request->calendar_id);
            $calendar->iniciada = true;
            $calendar->save();
          }, 'Fecha iniciada', 'Error al inicar la fecha');
      dump($r->original['message']);
    }

    public function sortear($pending = null){
      $request = new Request([
        'calendar_id' => 5, 
        'action' => 'sorteo'
      ]);
      if($pending !== null){
        $request->merge(['pending' => $pending]);
      }
      dd((new AppController())->setData($request));
    }


    public function correction(){
      return processTransaction(function(){
        $clasi = getClasificadosAfa();
        $equipos = \App\Models\Equipo::where('liga_id', 2)->get();
        $pos = 1;
        foreach($clasi->lib as $id){
          foreach($equipos as $e){
            if($e->id == $id){
              $e->copa = 'libertadores';
              $e->pos_clasificacion = $pos++;
              $e->save();
            }
          }
        }

        foreach($clasi->sud as $id){
          foreach($equipos as $e){
            if($e->id == $id){
              $e->copa = 'sudamericana';
              $e->pos_clasificacion = $pos++;
              $e->save();
            }
          }
        }
        foreach($equipos as $e){
          if(!in_array($e->id, $clasi->lib) && !in_array($e->id, $clasi->sud)){
            $e->copa = null;
            $e->pos_clasificacion = $pos++;
            $e->save();
          }
          
        }
      }, 'OK', 'Error: ');
    }


    public function fechas(){
      $grupos = (new GrupoController())->getGrupos(2000, 'afa', -2);
      $fechas = (new GrupoController())->getFixture();
      foreach($fechas as $k => $f){
          $fa = $f[0];
          $fb = $f[1];
          $nf = $k + 1;
          foreach($grupos as $grupo){
            if($grupo->grupo != 3){
              continue;
            }
            alert('-------------fecha: '.$nf.' grupo: '. $grupo->grupo.'--------------------');
            $loc = $grupo->equipos[$fa['loc']];
            $vis = $grupo->equipos[$fa['vis']];
            alert($loc->equipo.' vs '.$vis->equipo);
            $loc = $grupo->equipos[$fb['loc']];
            $vis = $grupo->equipos[$fb['vis']];
            alert($loc->equipo.' vs '.$vis->equipo);
            
          }
        }
    }


    public function deleteData(){
      return processTransaction(function(){
          \App\Models\Partido::where('copa', 'afa')->delete();
          $grupos = \App\Models\Grupo::where('copa', 'afa')->with('equipos')->get();
          foreach($grupos as $grupo){
            foreach($grupo->equipos as $equipo){
              $equipo->delete();
            }
            $grupo->delete();
          }
      }, 'OK', 'Error: ');
    }


    public function jugarFecha($copa, $fase, $fecha){

      dump($copa.' - '.getNameFase($copa, $fase).' - '.getFechaFase($copa, $fase, $fecha));
      $m = getMain();
      $partidos = \App\Models\Partido::with('grupo', 'equipoLocal', 'equipoVisitante')
                         ->where('anio', $m->anio)
                         ->where('copa', $copa)
                         ->where('fase', $fase)
                         ->where('fecha', $fecha)
                         ->where('is_jugado', false)
                         ->get();

      foreach($partidos as $partido){
        $ap = new AutoPartido($partido);
        dump($ap->jugar());
      }
      dump('--------------------------------------------------------------------------------');
    }



    public function procesarLote($lote){
      switch($lote){
        case 0: 
        dump('----------------------RECOPA--------------------------------');
          $this->inicarFecha();
          $this->jugarFecha('recopa', 5, 1);
          $this->inicarFecha();
          $this->jugarFecha('recopa', 5, 2);
          dd('----------------------FINALIZADO----------------------------');
        break;
        case 1: 
        dump('----------------------AFA PRELIMINAR - SUD LIB 1-3--------------------------------');
          $this->inicarFecha();
          $this->jugarFecha('afa', -2, 1);
          $this->inicarFecha();
          $this->jugarFecha('sudamericana', 0, 1);
          $this->inicarFecha();
          $this->jugarFecha('afa', -2, 2);
          $this->inicarFecha();
          $this->jugarFecha('libertadores', 0, 1);

          $this->inicarFecha();
          $this->jugarFecha('afa', -2, 3);
          $this->inicarFecha();
          $this->jugarFecha('sudamericana', 0, 2);
          $this->inicarFecha();
          $this->jugarFecha('afa', -2, 4);
          $this->inicarFecha();
          $this->jugarFecha('libertadores', 0, 2);

          $this->inicarFecha();
          $this->jugarFecha('afa', -2, 5);
          $this->inicarFecha();
          $this->jugarFecha('sudamericana', 0, 3);
          $this->inicarFecha();
          $this->jugarFecha('afa', -2, 6);
          $this->inicarFecha();
          $this->jugarFecha('libertadores', 0, 3);
          dd('----------------------FINALIZADO----------------------------');
        break;
        case 2: 
        dump('----------------------AFA 1° FASE - SUD LIB 4-6--------------------------------');
          $this->inicarFecha();
          $this->jugarFecha('afa', -1, 1);
          $this->inicarFecha();
          $this->jugarFecha('sudamericana', 0, 4);
          $this->inicarFecha();
          $this->jugarFecha('afa', -1, 2);
          $this->inicarFecha();
          $this->jugarFecha('libertadores', 0, 4);

          $this->inicarFecha();
          $this->jugarFecha('afa', -1, 3);
          $this->inicarFecha();
          $this->jugarFecha('sudamericana', 0, 5);
          $this->inicarFecha();
          $this->jugarFecha('afa', -1, 4);
          $this->inicarFecha();
          $this->jugarFecha('libertadores', 0, 5);

          $this->inicarFecha();
          $this->jugarFecha('afa', -1, 5);
          $this->inicarFecha();
          $this->jugarFecha('sudamericana', 0, 6);
          $this->inicarFecha();
          $this->jugarFecha('afa', -1, 6);
          $this->inicarFecha();
          $this->jugarFecha('libertadores', 0, 6);
          dd('----------------------FINALIZADO----------------------------');
        break;
        case 3: 
        dump('----------------------ARG - SUD - LIB DIECI--------------------------------');
          $this->inicarFecha();
          $this->jugarFecha('argentina', 1, 1);
          $this->inicarFecha();
          $this->jugarFecha('sudamericana', 1, 1);
          $this->inicarFecha();
          $this->jugarFecha('libertadores', 1, 1);

          $this->inicarFecha();
          $this->jugarFecha('argentina', 1, 2);
          $this->inicarFecha();
          $this->jugarFecha('sudamericana', 1, 2);
          $this->inicarFecha();
          $this->jugarFecha('libertadores', 1, 2);
          dd('----------------------FINALIZADO----------------------------');
        break;
        case 4: 
        dump('----------------------AFA 2° FASE (1 - 4) - ARG SUD LIB OCTAVOS--------------------------------');
          $this->inicarFecha();
          $this->jugarFecha('afa', 0, 1);
          $this->inicarFecha();
          $this->jugarFecha('argentina', 2, 1);
          $this->inicarFecha();
          $this->jugarFecha('afa', 0, 2);
          $this->inicarFecha();
          $this->jugarFecha('sudamericana', 2, 1);
          $this->inicarFecha();
          $this->jugarFecha('libertadores', 2, 1);

          $this->inicarFecha();
          $this->jugarFecha('afa', 0, 3);
          $this->inicarFecha();
          $this->jugarFecha('argentina', 2, 2);
          $this->inicarFecha();
          $this->jugarFecha('afa', 0, 4);
          $this->inicarFecha();
          $this->jugarFecha('sudamericana', 2, 2);
          $this->inicarFecha();
          $this->jugarFecha('libertadores', 2, 2);

          
          dd('----------------------FINALIZADO----------------------------');
        break;
        case 5: 
        dump('----------------------AFA 2° FASE (5 - 6) - ARG SUD LIB CUARTOS IDA--------------------------------');
          $this->inicarFecha();
          $this->jugarFecha('afa', 0, 5);
          $this->inicarFecha();
          $this->jugarFecha('argentina', 3, 1);
          $this->inicarFecha();
          $this->jugarFecha('afa', 0, 6);
          $this->inicarFecha();
          $this->jugarFecha('sudamericana', 3, 1);
          $this->inicarFecha();
          $this->jugarFecha('libertadores', 3, 1);
          
          dd('----------------------FINALIZADO----------------------------');
        break;
        case 6: 
        dump('----------------------AFA 3° FASE (1 - 2) - ARG SUD LIB CUARTOS VUELTA--------------------------------');
          $this->inicarFecha();
          $this->jugarFecha('afa', 1, 1);
          $this->inicarFecha();
          $this->jugarFecha('argentina', 3, 2);
          $this->inicarFecha();
          $this->jugarFecha('afa', 1, 2);
          $this->inicarFecha();
          $this->jugarFecha('sudamericana', 3, 2);
          $this->inicarFecha();
          $this->jugarFecha('libertadores', 3, 2);
          
          dd('----------------------FINALIZADO----------------------------');
        break;
        case 7: 
        dump('----------------------AFA 3° FASE (3 - 6) - ARG SUD LIB SEMIS--------------------------------');
          $this->inicarFecha();
          $this->jugarFecha('afa', 1, 3);
          $this->inicarFecha();
          $this->jugarFecha('argentina', 4, 1);
          $this->inicarFecha();
          $this->jugarFecha('afa', 1, 4);
          $this->inicarFecha();
          $this->jugarFecha('sudamericana', 4, 1);
          $this->inicarFecha();
          $this->jugarFecha('libertadores', 4, 1);

          $this->inicarFecha();
          $this->jugarFecha('afa', 1, 5);
          $this->inicarFecha();
          $this->jugarFecha('argentina', 4, 2);
          $this->inicarFecha();
          $this->jugarFecha('afa', 1, 6);
          $this->inicarFecha();
          $this->jugarFecha('sudamericana', 4, 2);
          $this->inicarFecha();
          $this->jugarFecha('libertadores', 4, 2);
          
          dd('----------------------FINALIZADO----------------------------');
        break;
        case 8: 
        dump('----------------------AFA OCTAVOS - ARG FINAL IDA--------------------------------');
          $this->inicarFecha();
          $this->jugarFecha('afa', 2, 1);
          $this->inicarFecha();
          $this->jugarFecha('afa', 2, 2);
          $this->inicarFecha();
          $this->jugarFecha('argentina', 5, 1);
          
          dd('----------------------FINALIZADO----------------------------');
        break;
        case 9: 
        dump('----------------------AFA CUARTOS - SUD LIB FINAL IDA--------------------------------');
          $this->inicarFecha();
          $this->jugarFecha('afa', 3, 1);
          $this->inicarFecha();
          $this->jugarFecha('afa', 3, 2);
          $this->inicarFecha();
          $this->jugarFecha('sudamericana', 5, 1);
          $this->inicarFecha();
          $this->jugarFecha('libertadores', 5, 1);
          
          dd('----------------------FINALIZADO----------------------------');
        break;
        case 10: 
        dump('----------------------AFA SEMIS - ARG SUD LIB FINAL VUELTA--------------------------------');
          $this->inicarFecha();
          $this->jugarFecha('afa', 4, 1);
          $this->inicarFecha();
          $this->jugarFecha('argentina', 5, 2);
          $this->inicarFecha();
          $this->jugarFecha('afa', 4, 2);
          $this->inicarFecha();
          $this->jugarFecha('sudamericana', 5, 2);
          $this->inicarFecha();
          $this->jugarFecha('libertadores', 5, 2);
          
          dd('----------------------FINALIZADO----------------------------');
        break;
        case 11: 
        dump('----------------------AFA FINAL--------------------------------');
          // $this->inicarFecha();
          // $this->jugarFecha('afa', 5, 1);
          // $this->inicarFecha();
          $this->jugarFecha('afa', 5, 2);
          
          dd('----------------------FINALIZADO----------------------------');
        break;

      }
      
    }

    }
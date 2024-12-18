<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\LigaController;
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

      //$s = new Sorteo('afa', 5);
      //dd($s->sortear());
      //dd(getHorarioAfa(16));
      // $p = \App\Models\Partido::with('grupo.equiposPosition')->find(256);
      // $p->local = \App\Models\Equipo::find($p->loc_id);
      // $p->visitante = \App\Models\Equipo::find($p->vis_id);
      // $ap = new AutoPartido($p);

      // $ap->jugar();
      $a = \App\Models\Equipo::where('name', 'atletico huila')->first();
      $b = \App\Models\Equipo::where('name', 'velez sarsfield')->first();
      //dd($this->cambiar($a, $b));
      (new LigaController())->autoFecha();
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


    function equalColor($a, $b){
      if($a->id == $b->id){
        return true;
      }
      return false;
    }

    function similColor($a, $b){
      $similares = json_decode($a->similares);
      return in_array($b->id, $similares);
    }


    
    function cambiar($loc, $vis){
      //dump($loc->camiseta->name, $vis->camiseta->name, $vis->alternativa->name);
      dump($loc->camiseta->similares, $vis->camiseta->id, $vis->alternativa->id);
      if($this->equalColor($loc->camiseta, $vis->camiseta)){
              dump('IGUAL');
        return true;
      }

      if($this->similColor($loc->camiseta, $vis->camiseta)){
        if($this->equalColor($loc->camiseta, $vis->alternativa)){
                dump('SIMILAR -IGUAL ALT');
          return false;
        }

        if($this->similColor($loc->camiseta, $vis->alternativa)){
                dump('SIMILAR -IGUAL ALT');
          return false;
        }
        return true;
      }
      
      dump('');
      return false;
      
      }

    }
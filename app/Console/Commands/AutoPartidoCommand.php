<?php

namespace App\Console\Commands;

use Illuminate\Http\Request;
use Illuminate\Console\Command;
use App\Classes\AutoPartido;
use App\Models\Equipo;
use App\Http\Controllers\MainController;

class AutoPartidoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'autopartido:run {lote}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private $progress;
    private $status;

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
    public function handle(){
      $this->progress = [];
      $this->status = true;
      $lote = $this->argument('lote'); 
       $this->procesarLote($lote);

       $this->output->writeln(json_encode(['status' => $this->status, 'progress' => $this->progress]));
    }

    private function iniciarFecha(){
      (new MainController())->initFecha(new Request([]));
    }


    private function jugarFecha($copa, $fase, $fecha){

      $this->progress[] = ['copa' => $copa, 'message' => $copa.' - '.getNameFase($copa, $fase).' - '.getFechaFase($copa, $fase, $fecha)];
      $m = getMain();
      $partidos = \App\Models\Partido::with('grupo.equiposPosition', 'local', 'visitante')
                         ->where('anio', $m->anio)
                         ->where('copa', $copa)
                         ->where('fase', $fase)
                         ->where('fecha', $fecha)
                         ->where('is_jugado', false)
                         ->get()
                         ->map(function($p){
                           $p->local = Equipo::find($p->loc_id);
                           $p->visitante = Equipo::find($p->vis_id);
                            return $p;
                         });

      foreach($partidos as $partido){
        $ap = new AutoPartido($partido);
        //dump($ap->jugar());
        $res = $ap->jugar();
        //printf(json_encode($res));
        $this->progress[] = ['copa' => $copa, 'message' => $res ? implode(' - ', [$res['result'], $res['message']]) : $res];
        if(!isset($res['result'])){
         // $this->status = false;
        }else{
          if($res['result'] != 'OK'){
            $this->status = false;
          }
        }
      }
      //dump('--------------------------------------------------------------------------------');
    }



    public function procesarLote($lote){
      switch($lote){
        case 0: 
        //dump('----------------------RECOPA--------------------------------');
          $this->iniciarFecha();
          $this->jugarFecha('recopa', 5, 1);
          $this->iniciarFecha();
          $this->jugarFecha('recopa', 5, 2);
          //dd('----------------------FINALIZADO----------------------------');
        break;
        case 1: 
        //dump('----------------------AFA PRELIMINAR - SUD LIB 1-3--------------------------------');
          $this->iniciarFecha();
          $this->jugarFecha('afa', -2, 1);
          $this->iniciarFecha();
          $this->jugarFecha('sudamericana', 0, 1);
          $this->iniciarFecha();
          $this->jugarFecha('afa', -2, 2);
          $this->iniciarFecha();
          $this->jugarFecha('libertadores', 0, 1);

          $this->iniciarFecha();
          $this->jugarFecha('afa', -2, 3);
          $this->iniciarFecha();
          $this->jugarFecha('sudamericana', 0, 2);
          $this->iniciarFecha();
          $this->jugarFecha('afa', -2, 4);
          $this->iniciarFecha();
          $this->jugarFecha('libertadores', 0, 2);

          $this->iniciarFecha();
          $this->jugarFecha('afa', -2, 5);
          $this->iniciarFecha();
          $this->jugarFecha('sudamericana', 0, 3);
          $this->iniciarFecha();
          $this->jugarFecha('afa', -2, 6);
          $this->iniciarFecha();
          $this->jugarFecha('libertadores', 0, 3);
          //dd('----------------------FINALIZADO----------------------------');
        break;
        case 2: 
        //dump('----------------------AFA 1° FASE - SUD LIB 4-6--------------------------------');
          $this->iniciarFecha();
          $this->jugarFecha('afa', -1, 1);
          $this->iniciarFecha();
          $this->jugarFecha('sudamericana', 0, 4);
          $this->iniciarFecha();
          $this->jugarFecha('afa', -1, 2);
          $this->iniciarFecha();
          $this->jugarFecha('libertadores', 0, 4);

          $this->iniciarFecha();
          $this->jugarFecha('afa', -1, 3);
          $this->iniciarFecha();
          $this->jugarFecha('sudamericana', 0, 5);
          $this->iniciarFecha();
          $this->jugarFecha('afa', -1, 4);
          $this->iniciarFecha();
          $this->jugarFecha('libertadores', 0, 5);

          $this->iniciarFecha();
          $this->jugarFecha('afa', -1, 5);
          $this->iniciarFecha();
          $this->jugarFecha('sudamericana', 0, 6);
          $this->iniciarFecha();
          $this->jugarFecha('afa', -1, 6);
          $this->iniciarFecha();
          $this->jugarFecha('libertadores', 0, 6);
          //dd('----------------------FINALIZADO----------------------------');
        break;
        case 3: 
        //dump('----------------------ARG - SUD - LIB DIECI--------------------------------');
          $this->iniciarFecha();
          $this->jugarFecha('argentina', 1, 1);
          $this->iniciarFecha();
          $this->jugarFecha('sudamericana', 1, 1);
          $this->iniciarFecha();
          $this->jugarFecha('libertadores', 1, 1);

          $this->iniciarFecha();
          $this->jugarFecha('argentina', 1, 2);
          $this->iniciarFecha();
          $this->jugarFecha('sudamericana', 1, 2);
          $this->iniciarFecha();
          $this->jugarFecha('libertadores', 1, 2);
          //dd('----------------------FINALIZADO----------------------------');
        break;
        case 4: 
        //dump('----------------------AFA 2° FASE (1 - 4) - ARG SUD LIB OCTAVOS--------------------------------');
          $this->iniciarFecha();
          $this->jugarFecha('afa', 0, 1);
          $this->iniciarFecha();
          $this->jugarFecha('argentina', 2, 1);
          $this->iniciarFecha();
          $this->jugarFecha('afa', 0, 2);
          $this->iniciarFecha();
          $this->jugarFecha('sudamericana', 2, 1);
          $this->iniciarFecha();
          $this->jugarFecha('libertadores', 2, 1);

          $this->iniciarFecha();
          $this->jugarFecha('afa', 0, 3);
          $this->iniciarFecha();
          $this->jugarFecha('argentina', 2, 2);
          $this->iniciarFecha();
          $this->jugarFecha('afa', 0, 4);
          $this->iniciarFecha();
          $this->jugarFecha('sudamericana', 2, 2);
          $this->iniciarFecha();
          $this->jugarFecha('libertadores', 2, 2);

          
          //dd('----------------------FINALIZADO----------------------------');
        break;
        case 5: 
        //dump('----------------------AFA 2° FASE (5 - 6) - ARG SUD LIB CUARTOS IDA--------------------------------');
          $this->iniciarFecha();
          $this->jugarFecha('afa', 0, 5);
          $this->iniciarFecha();
          $this->jugarFecha('argentina', 3, 1);
          $this->iniciarFecha();
          $this->jugarFecha('afa', 0, 6);
          $this->iniciarFecha();
          $this->jugarFecha('sudamericana', 3, 1);
          $this->iniciarFecha();
          $this->jugarFecha('libertadores', 3, 1);
          
          //dd('----------------------FINALIZADO----------------------------');
        break;
        case 6: 
        //dump('----------------------AFA 3° FASE (1 - 2) - ARG SUD LIB CUARTOS VUELTA--------------------------------');
          $this->iniciarFecha();
          $this->jugarFecha('afa', 1, 1);
          $this->iniciarFecha();
          $this->jugarFecha('argentina', 3, 2);
          $this->iniciarFecha();
          $this->jugarFecha('afa', 1, 2);
          $this->iniciarFecha();
          $this->jugarFecha('sudamericana', 3, 2);
          $this->iniciarFecha();
          $this->jugarFecha('libertadores', 3, 2);
          
          //dd('----------------------FINALIZADO----------------------------');
        break;
        case 7: 
        //dump('----------------------AFA 3° FASE (3 - 6) - ARG SUD LIB SEMIS--------------------------------');
          $this->iniciarFecha();
          $this->jugarFecha('afa', 1, 3);
          $this->iniciarFecha();
          $this->jugarFecha('argentina', 4, 1);
          $this->iniciarFecha();
          $this->jugarFecha('afa', 1, 4);
          $this->iniciarFecha();
          $this->jugarFecha('sudamericana', 4, 1);
          $this->iniciarFecha();
          $this->jugarFecha('libertadores', 4, 1);

          $this->iniciarFecha();
          $this->jugarFecha('afa', 1, 5);
          $this->iniciarFecha();
          $this->jugarFecha('argentina', 4, 2);
          $this->iniciarFecha();
          $this->jugarFecha('afa', 1, 6);
          $this->iniciarFecha();
          $this->jugarFecha('sudamericana', 4, 2);
          $this->iniciarFecha();
          $this->jugarFecha('libertadores', 4, 2);
          
          //dd('----------------------FINALIZADO----------------------------');
        break;
        case 8: 
        //dump('----------------------AFA OCTAVOS - ARG FINAL IDA--------------------------------');
          $this->iniciarFecha();
          $this->jugarFecha('afa', 2, 1);
          $this->iniciarFecha();
          $this->jugarFecha('afa', 2, 2);
          $this->iniciarFecha();
          $this->jugarFecha('argentina', 5, 1);
          
          //dd('----------------------FINALIZADO----------------------------');
        break;
        case 9: 
        //dump('----------------------AFA CUARTOS - SUD LIB FINAL IDA--------------------------------');
          $this->iniciarFecha();
          $this->jugarFecha('afa', 3, 1);
          $this->iniciarFecha();
          $this->jugarFecha('afa', 3, 2);
          $this->iniciarFecha();
          $this->jugarFecha('sudamericana', 5, 1);
          $this->iniciarFecha();
          $this->jugarFecha('libertadores', 5, 1);
          
          //dd('----------------------FINALIZADO----------------------------');
        break;
        case 10: 
        //dump('----------------------AFA SEMIS - ARG SUD LIB FINAL VUELTA--------------------------------');
          $this->iniciarFecha();
          $this->jugarFecha('afa', 4, 1);
          $this->iniciarFecha();
          $this->jugarFecha('argentina', 5, 2);
          $this->iniciarFecha();
          $this->jugarFecha('afa', 4, 2);
          $this->iniciarFecha();
          $this->jugarFecha('sudamericana', 5, 2);
          $this->iniciarFecha();
          $this->jugarFecha('libertadores', 5, 2);
          
          //dd('----------------------FINALIZADO----------------------------');
        break;
        case 11: 
        //dump('----------------------AFA FINAL--------------------------------');
          $this->iniciarFecha();
          $this->jugarFecha('afa', 5, 1);
          $this->iniciarFecha();
          $this->jugarFecha('afa', 5, 2);
          
          //dd('----------------------FINALIZADO----------------------------');
        break;

      }
      
    }
}

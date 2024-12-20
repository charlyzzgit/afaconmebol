<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AutoPartidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $fases = [
         'RECOPA',
         'AFA PRELIMINAR - SUD LIB 1-3',
         'AFA 1° FASE - SUD LIB 4-6',
         'ARG - SUD - LIB DIECI',
         'AFA 2° FASE (1 - 4) - ARG SUD LIB OCTAVOS',
         'AFA 2° FASE (5 - 6) - ARG SUD LIB CUARTOS IDA',
         'AFA 3° FASE (1 - 2) - ARG SUD LIB CUARTOS VUELTA',
         'AFA 3° FASE (3 - 6) - ARG SUD LIB SEMIS',
         'AFA OCTAVOS - ARG FINAL IDA',
         'AFA CUARTOS - SUD LIB FINAL IDA',
         'AFA SEMIS - ARG SUD LIB FINAL VUELTA',
         'AFA FINAL'
       ];

       $rows = [];

       foreach ($fases as $key => $f){
          $rows[] = [
                      'label' => $f,
                      'index' => $key
                    ];
       }

       //dd($rows);

       \DB::table('autopartido')->insert($rows);

       dd('OK');
    }
}

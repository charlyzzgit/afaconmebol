<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CuposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $l = 1;
        $s = 1;
        $rows = [
                  $this->getCupo('river plate', 'libertadores', $l++),
                  $this->getCupo('boca juniors', 'libertadores', $l++),
                  $this->getCupo('san lorenzo', 'libertadores', $l++),
                  $this->getCupo('velez sarsfield', 'libertadores', $l++),
                  $this->getCupo('independiente', 'libertadores', $l++),
                  $this->getCupo('racing club', 'libertadores', $l++),
                  $this->getCupo('huracan', 'libertadores', $l++),
                  $this->getCupo('ferrocarril oeste', 'libertadores', $l++),
                  $this->getCupo('rosario central', 'sudamericana', $s++),
                  $this->getCupo('newells old boys', 'sudamericana', $s++),
                  $this->getCupo('estudiantes la plata', 'sudamericana', $s++),
                  $this->getCupo('gimnasia la plata', 'sudamericana', $s++)
        ];

        //dd($rows);
      
      \DB::table('cupos_afa')->insert($rows);
    }

    private function getCupo($name, $copa, $pos){
      $id = getEquipoIdByName($name);
      if(!$id){
        return null;
      }
      return [
                'equipo_id' => $id,
                'name' => $name,
                'copa' => $copa,
                'pos' => $pos
      ];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $row = [
                'anio' => 2000,
                'lib' => getEquipoIdByName('san pablo fc'),
                'sud' => getEquipoIdByName('atletico nacional'),
                'afa_a' => getEquipoIdByName('river plate'),
                'afa_b' => getEquipoIdByName('boca juniors'),
                'afa_c' => getEquipoIdByName('san lorenzo'),
                'arg' => getEquipoIdByName('velez sarsfield')
              ];
      
      \DB::table('main')->insert($row);


    }
}

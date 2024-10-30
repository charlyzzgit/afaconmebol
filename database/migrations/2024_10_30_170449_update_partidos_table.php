<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePartidosTable extends Migration
{
  
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('partidos', function (Blueprint $table) {
        $table->integer('dia')->default(0)->change();
        $table->integer('relevancia')->default(0)->change();
        $table->integer('hora')->default(0)->change();
        $table->integer('gl')->default(0)->change();
        $table->integer('gv')->default(0)->change();
        $table->integer('pa')->default(0)->change();
        $table->integer('pb')->default(0)->change();
        $table->integer('d')->default(0)->change();
        $table->integer('s')->default(0)->change();
        $table->integer('winner')->nullable()->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('partidos', function (Blueprint $table) {
        $table->integer('dia')->change();
        $table->integer('relevancia')->change();
        $table->integer('hora')->change();
        $table->integer('gl')->change();
        $table->integer('gv')->change();
        $table->integer('pa')->change();
        $table->integer('pb')->change();
        $table->integer('d')->change();
        $table->integer('s')->change();
        $table->integer('winner')->change();
      });
    }
}

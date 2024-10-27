<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposGrupoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos_grupo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grupo_id')->nullable();
            $table->unsignedBigInteger('equipo_id')->nullable();
            $table->string('equipo')->nullable();
            $table->integer('j')->default(0);
            $table->integer('g')->default(0);
            $table->integer('e')->default(0);
            $table->integer('p')->default(0);
            $table->integer('gf')->default(0);
            $table->integer('gc')->default(0);
            $table->integer('gv')->default(0);
            $table->integer('d')->default(0);
            $table->integer('pts')->default(0);
            $table->integer('pos')->default(0);
            $table->integer('penales')->default(0);
            $table->integer('order')->default(0);
            $table->integer('nivel')->default(0);
            $table->integer('estado')->default(0);
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos_grupo');
    }
}

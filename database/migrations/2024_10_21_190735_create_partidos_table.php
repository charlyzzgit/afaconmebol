<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grupo_id')->nullable();
            $table->unsignedBigInteger('loc_id')->nullable();
            $table->unsignedBigInteger('vis_id')->nullable();
            $table->string('local')->nullable();
            $table->string('visitante')->nullable();
            $table->integer('anio');
            $table->string('copa');
            $table->integer('fase');
            $table->integer('fecha');
            $table->string('zona')->nullable();
            $table->integer('dia');
            $table->integer('relevancia');
            $table->integer('hora');
            $table->integer('gl');
            $table->integer('gv');
            $table->integer('pa');
            $table->integer('pb');
            $table->integer('d');
            $table->integer('s');
            $table->boolean('is_vuelta')->default(0);
            $table->boolean('is_define')->default(0);
            $table->boolean('is_final')->default(0);
            $table->boolean('is_jugado')->default(0);
            $table->integer('winner');
            $table->text('detalle')->nullable();
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
            $table->foreign('loc_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('vis_id')->references('id')->on('equipos')->onDelete('cascade');
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
        Schema::dropIfExists('partidos');
    }
}

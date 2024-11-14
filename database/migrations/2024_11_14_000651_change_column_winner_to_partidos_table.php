<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnWinnerToPartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partidos', function (Blueprint $table) {
            // Elimina la columna existente
            $table->dropColumn('winner');

            // Agrega la nueva columna con la clave foránea
            $table->unsignedBigInteger('winner_id')->nullable()->after('is_jugado');
            $table->foreign('winner_id')->references('id')->on('equipos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('partidos', function (Blueprint $table) {
            // Elimina la clave foránea y la columna winner_id
            $table->dropForeign(['winner_id']);
            $table->dropColumn('winner_id');

            // Agrega nuevamente la columna integer original
            $table->integer('winner')->nullable();
        });
    }
}

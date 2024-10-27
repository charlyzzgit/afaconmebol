<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main', function (Blueprint $table) {
            $table->id();
            $table->integer('anio');
            $table->unsignedBigInteger('lib')->nullable();
            $table->unsignedBigInteger('sud')->nullable();
            $table->unsignedBigInteger('rec')->nullable();
            $table->unsignedBigInteger('afa_a')->nullable();
            $table->unsignedBigInteger('afa_b')->nullable();
            $table->unsignedBigInteger('afa_c')->nullable();
            $table->unsignedBigInteger('arg')->nullable();
            $table->unsignedBigInteger('last_partido')->nullable();
            $table->foreign('lib')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('sud')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('rec')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('afa_a')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('afa_b')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('afa_c')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('arg')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('last_partido')->references('id')->on('partidos')->onDelete('cascade');
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
        Schema::dropIfExists('main');
    }
}

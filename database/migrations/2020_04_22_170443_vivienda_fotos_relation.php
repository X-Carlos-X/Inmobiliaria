<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ViviendaFotosRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('viviendas', function (Blueprint $table) {
            $table->foreign('usuario')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::table('vivienda_fotos', function (Blueprint $table) {
            $table->foreign('vivienda_id')
                ->references('id')
                ->on('viviendas')
                ->onDelete('cascade');

            $table->foreign('foto_id')
                ->references('id')
                ->on('fotos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

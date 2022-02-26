<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Crear table _estacionamiento en la BD
        Schema::create('_estacionamiento', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->string('entrada');
            $table->string('salida');
            $table->string('estado');
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
        Schema::dropIfExists('_estacionamiento');
    }
};

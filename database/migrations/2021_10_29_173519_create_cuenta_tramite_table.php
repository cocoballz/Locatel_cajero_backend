<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaTramiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_tramite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cuenta')->nullable(0);
            $table->foreign('id_cuenta')->references('id')->on('user_cuentas');
            $table->unsignedFloat('valor')->comment('Valor de la transaccion');
            $table->unsignedBigInteger('id_tipo_tramite')->nullable(0);
            $table->foreign('id_tipo_tramite')->references('id')->on('tipo_tramite');
            $table->unsignedBigInteger('id_tipo_estado_tramite');
            $table->foreign('id_tipo_estado_tramite')->references('id')->on('tipo_estado_tramite');

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
        Schema::dropIfExists('cuenta_tramite');
    }
}

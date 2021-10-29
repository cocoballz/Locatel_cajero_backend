<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cuenta')->nullable(0);
            $table->foreign('id_cuenta')->references('id')->on('user_cuentas');

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
        Schema::dropIfExists('cuenta_consultas');
    }
}

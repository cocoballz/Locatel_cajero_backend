<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoCuentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_cuenta', function (Blueprint $table) {
            $table->id();
            $table->string('tc_nombre')->nullable(FALSE)->comment('tipos de Cuentas');
            $table->integer('tc_estado')->nullable(FALSE)->default(1);
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
        Schema::dropIfExists('tipo_cuenta');
    }
}

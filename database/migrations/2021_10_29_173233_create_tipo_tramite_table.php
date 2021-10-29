<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoTramiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_tramite', function (Blueprint $table) {
            $table->id();
            $table->string('tt_nombre')->nullable(0);
            $table->char('tt_operacion')->comment('Saber si + - 0 en valor cuenta');
            $table->integer('tt_estado')->nullable(0)->default(1);
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
        Schema::dropIfExists('tipo_tramite');
    }
}

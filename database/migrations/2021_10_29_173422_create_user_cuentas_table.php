<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_cuentas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cuenta')->nullable()->unique()->index();
            $table->unsignedBigInteger('id_user')->nullable(0);
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_tipocuenta')->nullable(0);
            $table->foreign('id_tipocuenta')->references('id')->on('tipo_cuenta');
            $table->string('cliente_nomrbe')->nullable(0);
            $table->unsignedFloat('saldo')->nullable(0);
            $table->integer('estado')->nullable(0)->default(1);
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
        Schema::dropIfExists('user_cuentas');
    }
}

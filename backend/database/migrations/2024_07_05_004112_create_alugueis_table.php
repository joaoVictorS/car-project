<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlugueisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alugueis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('carro_id')->constrained('carros');
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->decimal('valor_total', 8, 2);
            $table->string('local_retirada');
            $table->string('local_devolucao');
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
        Schema::dropIfExists('alugueis');
    }
}

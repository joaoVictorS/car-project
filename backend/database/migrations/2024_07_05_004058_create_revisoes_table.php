<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('carro_id')->constrained('carros');
            $table->date('data_revisao');
            $table->text('descricao')->nullable();
            $table->date('proxima_revisao')->nullable();
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
        Schema::dropIfExists('revisoes');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cpf')->unique()->nullable();
            $table->string('nome');
            $table->string('telefone');
            $table->string('endereco');
            $table->string('email')->unique()->nullable();
            //$table->unsignedBigInteger('animal_id')->nullable();
            $table->timestamps();
        });

        /**
        *Schema::table('pessoas', function (Blueprint $table) {
        *    $table->foreign('animal_id')->references('id')->on('animals')->onDelete('set null'); 
        *});
        **/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}

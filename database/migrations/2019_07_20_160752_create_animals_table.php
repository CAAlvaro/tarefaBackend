<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('especie');
            $table->string('raca');
            $table->string('porte');
            $table->integer('idade');
            $table->unsignedBigInteger('pessoa_id')->nullable();
            $table->timestamps();
        });

        Schema::table('animals', function (Blueprint $table) {
            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}

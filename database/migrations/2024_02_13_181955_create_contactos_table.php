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
        Schema::create('contactos', function (Blueprint $table) {
            $table->increments('contacto_id');
            $table->string('telemovel1', 13);
            $table->string('telemovel2', 13)->nullable();
            $table->string('email', 70)->unique();
            $table->unsignedInteger('endereco_id')->nullable();
            $table->foreign('endereco_id')->references('endereco_id')->on('enderecos')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('contactos');
    }
};

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
        Schema::create('Reserveringen', function (Blueprint $table) {
            $table->id('ReserveringenID');
            $table->int('KlantID');
            $table->int('AutoID');
            $table->date('Reserveringsdatum');
            $table->string('Wachtwoord');
            $table->int('KlantID');
            $table-> foreign('KlantID')->references('KlantID')->on('klanten');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Account');
    }
};

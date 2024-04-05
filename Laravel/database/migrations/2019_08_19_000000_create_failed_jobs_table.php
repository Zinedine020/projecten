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
        Schema::create('verhuringen', function (Blueprint $table) {
            $table->id('VerhuurID');
            $table->string('Verhuurdatum');
            $table->unsignedBigInteger('KlantID');
            $table->unsignedBigInteger('AutoID');
            $table->foreign('KlantID')->references('KlantID')->on('klanten');
            $table->foreign('AutoID')->references('AutoID')->on('Autos');
            $table->string('Huurperiode');
            $table->decimal('Kosten', 10, 2);
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
        Schema::dropIfExists('verhuringen');
    }
};

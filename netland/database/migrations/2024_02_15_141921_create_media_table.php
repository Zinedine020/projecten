<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('rating');
            $table->integer('length_in_minutes');
            $table->date('released_at');
            $table->string('country_of_origin');
            $table->string('youtube_trailer_id');
            $table->text('summary');
            $table->string('spoken_in_language');
            $table->boolean('is_movie')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('media');
    }
}

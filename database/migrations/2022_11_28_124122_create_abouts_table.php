<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('header_heading')->nullable();
            $table->longText('header_content')->nullable();
            $table->string('header_image')->nullable();

            $table->longText('about_heading')->nullable();
            $table->longText('about_title')->nullable();
            $table->longText('about_contents')->nullable();
            $table->string('video')->nullable()->comment('youtube video link');
            $table->string('video_cover')->nullable();
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
        Schema::dropIfExists('abouts');
    }
}

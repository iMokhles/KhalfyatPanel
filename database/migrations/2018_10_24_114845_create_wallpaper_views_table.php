<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWallpaperViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallpaper_views', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('wallpaper_id');
            $table->foreign('wallpaper_id')->references('id')->on('wallpapers');

            $table->ipAddress('ip')->nullable();
            $table->unsignedInteger('views')->default(0);

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
        Schema::dropIfExists('wallpaper_views');
    }
}

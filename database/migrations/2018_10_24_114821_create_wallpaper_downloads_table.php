<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWallpaperDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallpaper_downloads', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('wallpaper_id');
            $table->foreign('wallpaper_id')->references('id')->on('wallpapers');

            $table->ipAddress('ip')->nullable();
            $table->unsignedInteger('downloads')->default(0);

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
        Schema::dropIfExists('wallpaper_downloads');
    }
}

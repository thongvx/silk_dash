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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('video_id', 20)->index();
            $table->integer('user_id')->nullable();
            $table->string('folder', 15)->nullable();
            $table->string('path_stream', 10)->nullable();
            $table->string('sd', 10)->nullable();
            $table->string('hd', 10)->nullable();
            $table->string('fhd', 10)->nullable();
            $table->boolean('soft_delete')->nullable();
            $table->string('title', 500)->nullable();
            $table->string('poster')->nullable();
            $table->string('grid_poster')->nullable();
            $table->boolean('is_sub')->nullable()->comment('check xem có sub hay không');
            $table->integer('total_play')->nullable();
            $table->integer('last_played')->nullable();
            $table->bigInteger('size')->nullable()->comment('kich co file');
            $table->integer('duration')->nullable();
            $table->string('quality', 5)->nullable();
            $table->string('format', 5)->nullable();
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
        Schema::dropIfExists('videoManage');
    }
};

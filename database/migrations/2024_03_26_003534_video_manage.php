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
        Schema::create('video_manage', function (Blueprint $table) {
            $table->increments('id');
            $table->string('video_id', 20)->index();
            $table->string('middle_video_id', 20)->index();
            $table->string('origin_video', 30)->index();
            $table->integer('user_id')->nullable();
            $table->string('folder', 15)->nullable();
            $table->string('path_stream', 10)->nullable();
            $table->string('sd', 10)->nullable();
            $table->string('hd', 10)->nullable();
            $table->string('fhd', 10)->nullable();
            $table->integer('soft_delete')->nullable();
            $table->text('title')->nullable();
            $table->text('poster')->nullable();
            $table->text('grid_poster')->nullable();
            $table->integer('sub')->nullable();
            $table->integer('total_play')->nullable();
            $table->integer('last_played')->nullable();
            $table->integer('date_upload')->nullable();
            $table->text('size')->nullable();
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

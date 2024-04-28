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
        Schema::create('video', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 20)->unique();
            $table->string('middle_slug', 20)->index();
            $table->integer('user_id')->index();
            $table->string('folder_id', 15)->nullable();
            $table->string('sd', 10)->nullable();
            $table->string('hd', 10)->nullable();
            $table->string('fhd', 10)->nullable();
            $table->string('title', 500)->comment('file name');
            $table->string('poster')->nullable();
            $table->string('grid_poster')->nullable();
            $table->boolean('is_sub')->nullable()->comment('check xem có sub hay không');
            $table->integer('total_play')->nullable();
            $table->bigInteger('size')->nullable()->comment('kich co file');
            $table->integer('duration')->nullable();
            $table->string('quality', 5)->nullable();
            $table->string('format', 5)->nullable();
            $table->string('check_duplicate', 50)->index();
            $table->boolean('origin')->nullable();
            $table->boolean('soft_delete')->nullable();
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

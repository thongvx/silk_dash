<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('video_id')->index();
            $table->string('status');
            $table->integer('priority');
            $table->string('quality');
            $table->string('size');
            $table->string('sv_encoder');
            $table->string('sv_upload');
            $table->timestamp('start_encoder')->nullable();
            $table->timestamp('finish_encoder')->nullable();
            $table->string('sv_storage');
            $table->integer('retry');
            $table->integer('failure');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('servers');
    }
};

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
        Schema::create('encoder_task', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('slug', 20)->nullable();
            $table->integer('status')->nullable();
            $table->integer('priority')->nullable();
            $table->integer('quality')->nullable();
            $table->bigInteger('size')->nullable();
            $table->string('format', 5)->nullable();
            $table->string('sv_encoder', 5)->nullable();
            $table->string('sv_upload', 5)->nullable();
            $table->string('sv_storage', 5)->nullable();
            $table->integer('start_encoder')->nullable();
            $table->integer('finish_encoder')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sv_encoder');
    }
};

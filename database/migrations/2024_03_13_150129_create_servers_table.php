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
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('videoID');
            $table->string('status');
            $table->integer('priority');
            $table->string('quality');
            $table->string('size');
            $table->string('svEncoder');
            $table->string('svUpload');
            $table->integer('startEncoder');
            $table->integer('finishEncoder');
            $table->string('svStorage');
            $table->integer('retry');
            $table->integer('failure');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};

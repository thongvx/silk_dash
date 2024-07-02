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
        Schema::create('sv_encoders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 10)->nullable();
            $table->string('ip', 15)->nullable();
            $table->string('pass', 50)->nullable();
            $table->integer('port')->nullable();
            $table->integer('upload')->nullable();
            $table->integer('encoder')->nullable();
            $table->integer('transfer')->nullable();
            $table->integer('torrent')->nullable();
            $table->float('cpu')->nullable();
            $table->float('space')->nullable();
            $table->float('used_space')->nullable();
            $table->integer('max_speed')->nullable();
            $table->float('in_speed')->nullable();
            $table->float('out_speed')->nullable();
            $table->string('provider', 20)->nullable();
            $table->boolean('active')->default(true);
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

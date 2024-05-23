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
        Schema::create('sv_stream', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 10)->nullable();
            $table->string('ip', 20)->nullable();
            $table->string('domain', 50)->nullable();
            $table->string('pass', 20)->nullable();
            $table->integer('port')->nullable();
            $table->integer('number_video')->nullable();
            $table->float('cpu')->nullable();
            $table->float('space')->nullable();
            $table->float('used_space')->nullable();
            $table->integer('max_speed')->nullable();
            $table->float('in_speed')->nullable();
            $table->float('out_speed')->nullable();
            $table->string('provider', 20)->nullable();
            $table->boolean('in_data')->default(true);
            $table->boolean('active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

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
        Schema::create('sv_storages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 10)->nullable();
            $table->string('ip', 15)->nullable();
            $table->string('pass', 20)->nullable();
            $table->integer('port')->nullable();
            $table->integer('number_files')->nullable();
            $table->float('cpu')->nullable();
            $table->float('space')->nullable();
            $table->float('used_space')->nullable();
            $table->float('percent_space')->nullable();
            $table->integer('bw')->nullable();
            $table->float('used_bw')->nullable();
            $table->integer('max_speed')->nullable();
            $table->float('in_speed')->nullable();
            $table->float('out_speed')->nullable();
            $table->integer('in_data')->nullable()->comment('???');
            $table->string('provider', 20)->nullable();
            $table->boolean('active')->default(true);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sv_storage');
    }
};

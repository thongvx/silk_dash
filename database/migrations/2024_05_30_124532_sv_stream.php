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

        if (!Schema::hasTable('sv_stream')) {
            Schema::create('sv_stream', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', 10)->nullable();
                $table->string('ip', 20)->nullable();
                $table->string('ip_lan', 20)->nullable();
                $table->string('ipv6', 100)->nullable();
                $table->string('domain', 50)->nullable();
                $table->string('pass', 50)->nullable();
                $table->integer('port')->nullable();
                $table->integer('number_video')->nullable();
                $table->float('cpu')->nullable();
                $table->float('space')->nullable();
                $table->float('used_space')->nullable();
                $table->float('percent_space')->nullable();
                $table->integer('max_speed')->nullable();
                $table->float('in_speed')->nullable();
                $table->float('out_speed')->nullable();
                $table->string('provider', 20)->nullable();
                $table->boolean('in_data')->default(true);
                $table->boolean('active')->default(true);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sv_stream');
    }
};

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
        Schema::create('add_tiktok', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->string('slug', 20);
            $table->string('quality', 5);
            $table->string('path', 10);
            $table->string('sv',15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_tiktok');
    }
};

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
        Schema::create('player_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('show_title');
            $table->boolean('show_logo');
            $table->boolean('show_poster');
            $table->boolean('show_download');
            $table->boolean('show_preview');
            $table->boolean('infinite_loop');
            $table->boolean('disable_adblock');
            $table->integer('thumbnail_grid');
            $table->string('premium_color');
            $table->integer('embed_width');
            $table->integer('embed_height');
            $table->string('logo_link')->nullable();
            $table->string('position')->nullable();
            $table->string('poster_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_settings');
    }
};

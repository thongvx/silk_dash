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
            $table->foreignId('user_id');
            $table->boolean('show_title')->default(true);
            $table->boolean('show_logo')->default(false);
            $table->boolean('show_poster')->default(true);
            $table->boolean('show_download')->default(false);
            $table->boolean('show_preview')->default(false);
            $table->boolean('enable_caption')->default(false);
            $table->boolean('infinite_loop')->default(false);
            $table->boolean('disable_adblock')->default(true);
            $table->integer('thumbnail_grid')->default(1);
            $table->string('premium_color')->default('rgb(221,51,51)');
            $table->integer('embed_width')->default(800);
            $table->integer('embed_height')->default(600);
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

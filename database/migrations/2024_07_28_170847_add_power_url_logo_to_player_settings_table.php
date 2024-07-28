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
        Schema::table('player_settings', function (Blueprint $table) {
            $table->string('power_url_logo')->default('https://streamsilk.com');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('player_settings', function (Blueprint $table) {
            $table->dropColumn('power_url_logo');

        });
    }
};

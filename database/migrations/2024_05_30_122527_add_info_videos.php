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
        Schema::table('videos', function (Blueprint $table) {
            // Thêm cột mới;
            $table->string('stream', 200)->nullable();
            $table->string('grid_poster_5', 500)->nullable();
            $table->renameColumn('grid_poster', 'grid_poster_3');
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

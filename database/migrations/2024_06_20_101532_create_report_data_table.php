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
        Schema::create('reports_data', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('views')->default(0);
            $table->integer('download')->default(0);
            $table->integer('paid_views')->default(0);
            $table->integer('vpn_ads_views')->default(0);
            $table->decimal('revenue', 8, 2)->default(0.00);
            $table->decimal('cpm', 8, 2)->default(0.00);
            $table->date('date');

            $table->unique(['user_id', 'date']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_data');
    }
};

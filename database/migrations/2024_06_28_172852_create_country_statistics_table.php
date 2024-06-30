<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('country_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('country_code', 2);
            $table->integer('views')->default(0);
            $table->integer('download')->default(0);
            $table->integer('paid_views')->default(0);
            $table->integer('vpn_ads_views')->default(0);
            $table->decimal('revenue', 8, 2)->default(0.00);
            $table->date('date');

            $table->unique(['user_id', 'country_code', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('country_statistics');
    }
};

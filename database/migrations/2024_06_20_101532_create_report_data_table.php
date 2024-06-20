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
        Schema::create('report_data', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->date('date');
            $table->string('country');
            $table->integer('views');
            $table->integer('download');
            $table->integer('paid_views');
            $table->integer('vpn_ads_views');
            $table->decimal('revenue', 8, 2);
            $table->timestamps();
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

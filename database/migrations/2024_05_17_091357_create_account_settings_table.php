<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('setting_key');
            $table->text('setting_value')->nullable();
            $table->integer('videoType');
            $table->integer('earningModes');
            $table->boolean('adblock');
            $table->boolean('showTitle');
            $table->string('logo');
            $table->string('logoLink')->nullable();
            $table->string('position');
            $table->string('poster');
            $table->boolean('blockDirect');
            $table->string('domain');
            $table->boolean('publicVideo');
            $table->boolean('premiumMode');
            $table->boolean('captionsMode');
            $table->boolean('disableDownload');
            $table->integer('gridPoster');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_settings');
    }
}

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
        Schema::create('transfer', function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->string('slug', 20)->unique();
            $table->string('title', 500)->nullable();
            $table->integer('priority')->nullable();
            $table->string('url', 500)->nullable();
            $table->smallInteger('status')->nullable();
            $table->string('sv_transfer', 5)->nullable();
            $table->integer('folder_id')->nullable();
            $table->integer('progress')->nullable();
            $table->bigInteger('size_download')->nullable();
            $table->bigInteger('size')->nullable();
            $table->timestamps();
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

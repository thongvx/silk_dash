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
        Schema::table('users', function (Blueprint $table) {
            // Thêm cột mới;
            $table->integer('user_id')->nullable();
            $table->string('key_api', 25)->nullable();
            $table->string('website', 50)->nullable();
            $table->string('skype', 100)->nullable();
            $table->string('telegram',100)->nullable();
            $table->string('support', 200)->nullable();
            $table->integer('dmca')->nullable();
            $table->integer('last_upload')->nullable();
            $table->integer('uploaded')->nullable();
            $table->integer('video')->nullable();
            $table->integer('play')->nullable();
            $table->bigInteger('storage')->nullable();
            $table->string('domain', 50)->nullable();
            $table->integer('max_transfer')->nullable();
            $table->integer('max_torrent')->nullable();
            $table->integer('encoder_priority')->nullable();
            $table->integer('transfer_priority')->nullable();
            $table->integer('torrent_priority')->nullable();
            $table->integer('stream_priority')->nullable();
            $table->integer('start_date')->nullable();
            $table->integer('earning')->nullable();
            $table->integer('premium')->nullable();
            $table->text('note')->nullable();
            $table->text('setting')->nullable();
            $table->integer('active')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};

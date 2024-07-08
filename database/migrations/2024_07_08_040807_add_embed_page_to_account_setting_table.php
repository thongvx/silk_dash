<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmbedPageToAccountSettingTable extends Migration
{
    public function up()
    {
        Schema::table('account_settings', function (Blueprint $table) {
            $table->boolean('embed_page')->default(false); // Assuming you want the default to be false
        });
    }

    public function down()
    {
        Schema::table('account_settings', function (Blueprint $table) {
            $table->dropColumn('embed_page');
        });
    }
}

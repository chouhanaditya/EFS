<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableSymbolMutualfunds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::table('mutualfunds', function($table) {
        $table->string('symbol')->nullable()->change();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mutualfunds', function($table) {
        $table->unsignedInteger('symbol')->nullable(false)->change();
    });
    }
}

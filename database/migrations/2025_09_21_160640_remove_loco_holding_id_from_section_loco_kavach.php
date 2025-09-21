<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('section_loco_kavach', function (Blueprint $table) {
        $table->dropColumn('loco_holding_id');
    });
}

public function down()
{
    Schema::table('section_loco_kavach', function (Blueprint $table) {
        $table->unsignedBigInteger('loco_holding_id')->nullable();
    });
}

};

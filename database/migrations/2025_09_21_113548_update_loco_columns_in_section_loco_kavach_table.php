<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('section_loco_kavach', function (Blueprint $table) {
            // rename old column
            $table->renameColumn('loco_shed_holding_id', 'loco_shed_id');

            // add new column
            $table->unsignedBigInteger('loco_holding_id')->nullable()->after('loco_shed_id');
        });
    }

    public function down()
    {
        Schema::table('section_loco_kavach', function (Blueprint $table) {
            // rollback changes
            $table->renameColumn('loco_shed_id', 'loco_shed_holding_id');
            $table->dropColumn('loco_holding_id');
        });
    }
};

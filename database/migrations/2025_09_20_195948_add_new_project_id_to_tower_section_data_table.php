<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tower_section_data', function (Blueprint $table) {
            $table->unsignedBigInteger('new_project_id')->nullable()->after('id');
        });
    }

    public function down()
    {
        Schema::table('tower_section_data', function (Blueprint $table) {
            $table->dropColumn('new_project_id');
        });
    }
};

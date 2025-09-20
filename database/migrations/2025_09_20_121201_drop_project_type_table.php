<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // 🔹 Pehle foreign key drop karo
        Schema::table('new_project', function (Blueprint $table) {
            $table->dropForeign(['project_type_id']);  // foreign key hatana
        });

        // 🔹 Ab parent table drop karo
        Schema::dropIfExists('project_type');
    }

    public function down()
    {
        // 🔹 Rollback karne par project_type wapas create ho
        Schema::create('project_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // apne columns ke hisaab se dalna
            $table->timestamps();
        });

        // 🔹 Foreign key wapas add karna
        Schema::table('new_project', function (Blueprint $table) {
            $table->foreign('project_type_id')
                  ->references('id')->on('project_type')
                  ->onDelete('cascade'); 
        });
    }
};



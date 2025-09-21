<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tower_section_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_id');
            $table->integer('rkm');

            // Tower Foundation (Station Level)
            $table->integer('tower_foundation_stn_scope');
            $table->integer('tower_foundation_stn_comp')->default(0);

            // Tower Erection (Station Level)
            $table->integer('tower_erection_stn_scope');
            $table->integer('tower_erection_stn_comp')->default(0);

            // Tower Foundation (General)
            $table->integer('tower_foundation_scope');
            $table->integer('tower_foundation_comp')->default(0);

            // Tower Erection (General)
            $table->integer('tower_erection_scope');
            $table->integer('tower_erection_comp')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tower_section_data');
    }
};

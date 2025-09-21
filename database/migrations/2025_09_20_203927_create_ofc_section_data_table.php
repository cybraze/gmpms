<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ofc_section_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('new_project_id');
            $table->unsignedBigInteger('section_id');
            $table->integer('rkm');

            // OFC Duct
            $table->integer('ofc_duct_scope');
            $table->integer('ofc_duct_comp')->default(0);

            // OFC Laying
            $table->integer('ofc_lay_scope');
            $table->integer('ofc_lay_comp')->default(0);

            // Outdoor Design
            $table->integer('outdoor_design_scope');
            $table->integer('outdoor_design_comp')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ofc_section_data');
    }
};

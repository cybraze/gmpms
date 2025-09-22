<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGkSectionDataTable extends Migration
{
    public function up()
    {
        Schema::create('gk_section_data', function (Blueprint $table) {
            $table->id();
            $table->integer('section_id');
            $table->integer('rkm');
            $table->integer('rfid_scope');
            $table->integer('rfid_comp');
            $table->integer('se_stn_scope');
            $table->integer('se_stn_comp');
            $table->integer('se_hut_scope');
            $table->integer('se_hut_comp');
            $table->integer('fat_stn_scope');
            $table->integer('fat_stn_comp');
            $table->integer('fat_hut_scope');
            $table->integer('fat_hut_comp');
            $table->integer('sat_stn_scope');
            $table->integer('sat_stn_comp');
            $table->integer('sat_hut_scope');
            $table->integer('sat_hut_comp');
            $table->integer('idd_stn_scope');
            $table->integer('idd_stn_comp');
            $table->integer('idd_hut_scope');
            $table->integer('idd_hut_comp');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gk_section_data');
    }
}

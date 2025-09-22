<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('loco_shed_holding_master', function (Blueprint $table) {
            $table->id();
            $table->string('loco_shed');
            $table->integer('loco_holding');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loco_shed_holding_master');
    }
};

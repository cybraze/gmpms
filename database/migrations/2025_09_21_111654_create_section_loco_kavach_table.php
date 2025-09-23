<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('section_loco_kavach', function (Blueprint $table) {
            $table->id();

            // foreign key relation with loco_shed_holding_master
            $table->unsignedBigInteger('loco_shed_holding_id');

            $table->integer('allotment_kernex')->default(0);
            $table->integer('allotment_medha')->default(0);
            $table->integer('fitted_kernex')->default(0);
            $table->integer('fitted_medha')->default(0);

            $table->text('remarks')->nullable();

            $table->timestamps();

            // optional: foreign key constraint
            $table->foreign('loco_shed_holding_id')
                  ->references('id')->on('loco_shed_holding_master')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('section_loco_kavach');
    }
};

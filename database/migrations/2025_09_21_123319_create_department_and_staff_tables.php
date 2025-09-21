<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Department Master Table
        Schema::create('department_master', function (Blueprint $table) {
            $table->id();
            $table->string('staff_dept');
            $table->timestamps();
        });

        // Staff Master Table
        Schema::create('staff_master', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dept_id');
            $table->string('designation');
            $table->timestamps();

            // Foreign key relation with department_master
            $table->foreign('dept_id')
                  ->references('id')->on('department_master')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('staff_master');
        Schema::dropIfExists('department_master');
    }
};

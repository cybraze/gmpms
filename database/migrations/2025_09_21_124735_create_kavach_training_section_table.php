<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kavach_training_section', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('new_project_id');
            $table->unsignedBigInteger('staff_dept_id');

            $table->integer('total_strength');
            $table->integer('iriset')->default(0);
            $table->integer('self')->default(0);
            $table->integer('other')->default(0);

            $table->text('remarks')->nullable();

            $table->timestamps();

            // optional foreign key
            $table->foreign('staff_dept_id')
                  ->references('id')->on('department_master')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kavach_training_section');
    }
};

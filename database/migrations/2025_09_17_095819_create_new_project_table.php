<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('new_project', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('project_type_id');
        $table->string('project_name');
        $table->timestamps();

        $table->foreign('project_type_id')->references('id')->on('project_type')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_project');
    }
};

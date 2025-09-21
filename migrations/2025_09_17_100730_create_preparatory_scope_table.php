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
    Schema::create('preparatory_scope', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('new_project_id');
        $table->unsignedBigInteger('item_id');
        $table->text('description')->nullable();
        $table->string('scope');
        $table->string('progress');
        $table->timestamps();

        $table->foreign('new_project_id')->references('id')->on('new_project')->onDelete('cascade');
        $table->foreign('item_id')->references('id')->on('master_object_item')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preparatory_scope');
    }
};

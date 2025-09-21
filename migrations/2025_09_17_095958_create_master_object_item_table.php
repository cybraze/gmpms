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
    Schema::create('master_object_item', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('object_id');
        $table->string('item_name');
        $table->string('unit');
        $table->timestamps();

        $table->foreign('object_id')->references('id')->on('sheet_object')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_object_item');
    }
};

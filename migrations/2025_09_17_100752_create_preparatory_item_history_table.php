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
    Schema::create('preparatory_item_history', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('scope_id');
        $table->string('scope');
        $table->string('progress');
        $table->timestamps();

        $table->foreign('scope_id')->references('id')->on('preparatory_scope')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preparatory_item_history');
    }
};

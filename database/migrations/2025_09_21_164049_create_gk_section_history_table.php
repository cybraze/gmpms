<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gk_section_history', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('gk_section_id');   // link to main table
    $table->unsignedBigInteger('new_project_id');
    $table->json('snapshot_json');                 // full snapshot JSON
    $table->unsignedBigInteger('changed_by')->nullable();
    $table->timestamp('changed_at')->useCurrent();
    $table->timestamps();

    $table->foreign('gk_section_id')->references('id')->on('gk_section_data')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gk_section_history');
    }




    
};

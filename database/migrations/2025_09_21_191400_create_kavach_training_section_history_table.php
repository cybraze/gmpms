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
    Schema::create('kavach_training_section_history', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('training_section_id'); // link to main table
        $table->unsignedBigInteger('new_project_id');
        $table->unsignedBigInteger('staff_id');
        $table->json('snapshot_json'); // full snapshot
        $table->unsignedBigInteger('changed_by')->nullable();
        $table->timestamp('changed_at')->useCurrent();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kavach_training_section_history');
    }
};

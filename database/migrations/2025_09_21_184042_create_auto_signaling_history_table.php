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
        Schema::create('auto_signaling_history', function (Blueprint $table) {
            $table->id();
            
            // Link to auto_signaling (assuming your main table is `auto_signaling`)
            $table->foreignId('auto_signaling_id')
                  ->constrained('project_auto_signaling')
                  ->onDelete('cascade');

            // Snapshot of changes
            $table->json('snapshot_json');

            // Who changed + when
            $table->unsignedBigInteger('changed_by')->nullable();
            $table->timestamp('changed_at')->useCurrent();
            $table->timestamps();

            // If you have users table, add relation
            // $table->foreign('changed_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auto_signaling_history');
    }
};

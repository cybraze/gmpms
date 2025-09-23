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
        Schema::create('obub_history', function (Blueprint $table) {
            $table->id();

            // Link to obub table
            $table->foreignId('obub_id')->constrained('obub_data')->onDelete('cascade');

            // Snapshot of changes
            $table->json('snapshot_json');

            // Who changed + when
            $table->unsignedBigInteger('changed_by')->nullable();
            $table->timestamp('changed_at')->useCurrent();

            $table->timestamps();

            // Optional foreign key if you have a users table
            //$table->foreign('changed_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obub_history');
    }
};

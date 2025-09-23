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
        Schema::create('kavach_tender_history', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('kavach_tender_id'); // link to tender_data
            $table->json('snapshot_json'); // store full tender data as JSON
            $table->unsignedBigInteger('changed_by')->nullable(); // user who made change
            $table->timestamp('changed_at')->nullable();

            $table->timestamps();

            // foreign keys
            $table->foreign('kavach_tender_id')
                  ->references('id')
                  ->on('kavach_tender_data')
                  ->onDelete('cascade');

            $table->foreign('changed_by')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kavach_tender_history');
    }
};

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
        Schema::create('ni_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ni_data_id')->constrained('ni_data')->onDelete('cascade');
            $table->json('snapshot'); // Full JSON snapshot of ni_data at that point
            $table->foreignId('changed_by')->constrained('users')->onDelete('cascade');
            $table->timestamp('changed_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ni_histories');
    }
};

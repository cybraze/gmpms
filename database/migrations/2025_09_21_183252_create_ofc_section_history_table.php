<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ofc_section_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ofc_section_id'); // link to main table
            $table->unsignedBigInteger('new_project_id');
            $table->unsignedBigInteger('section_id')->nullable();
            $table->json('snapshot_json'); // full snapshot JSON
            $table->unsignedBigInteger('changed_by')->nullable();
            $table->timestamp('changed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ofc_section_history');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loco_kavach_section_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loco_section_id'); // main table reference
            $table->unsignedBigInteger('new_project_id');
            $table->unsignedBigInteger('loco_shed_id')->nullable();
            $table->json('snapshot_json'); // pura record json
            $table->unsignedBigInteger('changed_by')->nullable();
            $table->timestamp('changed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loco_kavach_section_history');
    }
};

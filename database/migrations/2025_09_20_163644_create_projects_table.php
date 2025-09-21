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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            // Foreign keys
            $table->foreignId('station_id')->constrained('stations')->onDelete('cascade');
            $table->foreignId('ph_id')->constrained('plan_heads')->onDelete('cascade');
            $table->foreignId('agency_id')->constrained('agencies')->onDelete('cascade');
            // Work type
            $table->string('work_type')->nullable();
            // Status fields with defaults
            $table->tinyInteger('tender_status')->default(0);   // 0=pending,1=awarded
            $table->tinyInteger('esp_status')->default(0);      // 0=pending,1=approved
            $table->tinyInteger('sip_status')->default(0);      // 0=pending,1=approved
            $table->tinyInteger('crs_status')->default(0);      // 0=pending,1=obtained,2=submitted
            $table->date('crs_sanction_date')->nullable();      // default NULL instead of "0.0.0"
            $table->tinyInteger('building_status')->default(0); // 0=pending,1=completed
            $table->date('building_tdc')->nullable();
            // Progress fields
            $table->unsignedTinyInteger('indoor_progress_pct')->default(0);
            $table->unsignedTinyInteger('outdoor_progress_pct')->default(0);
            $table->date('tds_target')->nullable();
            // Remarks
            $table->text('remarks')->nullable();
            // Audit
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

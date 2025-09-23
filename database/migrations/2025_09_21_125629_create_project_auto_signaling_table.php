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
        Schema::create('project_auto_signaling', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->constrained('divisions')->onDelete('cascade');
            $table->foreignId('section_id')->constrained('auto_signal_section')->onDelete('cascade');

            $table->decimal('target_rkm', 10, 2)->default(0);     // Target RKM
            $table->decimal('completed_rkm', 10, 2)->default(0);  // Completed RKM
            $table->decimal('balance_rkm', 10, 2)->default(0);    // Balance RKM

            $table->year('target_year')->nullable();

            // Status fields: 0 = pending, 1 = approved
            $table->tinyInteger('esp_status')->default(0);
            $table->tinyInteger('sip_status')->default(0);
            $table->tinyInteger('rcc_status')->default(0);
            $table->tinyInteger('swr_status')->default(0);
            $table->tinyInteger('interface_status')->default(0);
            $table->tinyInteger('app_logic_status')->default(0);
            $table->tinyInteger('fat_status')->default(0);
            $table->tinyInteger('sat_status')->default(0);
            $table->tinyInteger('tender_status')->default(0);

            $table->decimal('indoor_progress_pct', 5, 2)->default(0);
            $table->decimal('outdoor_progress_pct', 5, 2)->default(0);
            $table->tinyInteger('gm_sanction_status')->default(0);
            $table->decimal('tdc_target', 10, 2)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_auto_signaling');
    }
};

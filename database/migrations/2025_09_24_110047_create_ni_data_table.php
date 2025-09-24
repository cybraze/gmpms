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
        Schema::create('ni_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->constrained('divisions')->onDelete('cascade');
            $table->string('project_name');
            $table->foreignId('station_id')->constrained('stations')->onDelete('cascade');
            $table->foreignId('agency_id')->constrained('agencies')->onDelete('cascade');
            $table->foreignId('section_id')->constrained('auto_signal_section')->onDelete('cascade');
            $table->decimal('section_in_km', 8, 2);
            $table->date('proposed_ni_month')->nullable();
            $table->date('for_pre_ni')->nullable();
            $table->date('for_pre_ni_to')->nullable();
            $table->date('for_ni_from')->nullable();
            $table->date('for_ni_to')->nullable();
            $table->date('crs_inspection_date')->nullable();
            $table->boolean('is_commissioned')->default(0);
            $table->text('remarks')->nullable();
            $table->string('esp_status')->nullable();
            $table->string('sip_status')->nullable();
            $table->string('crs_application_status')->nullable();
            $table->string('crs_tdc')->nullable();
            $table->string('crs_sanction_status')->nullable();
            $table->integer('month_number')->nullable();
            $table->string('ni_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ni_data');
    }
};

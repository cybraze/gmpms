<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('obub_data', function (Blueprint $table) {
            $table->id();

            // Master connections
            $table->string('div_id', 2); // division code
            $table->string('lc_no', 50)->nullable();

            $table->foreignId('state_id')
                  ->constrained('obub_states')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->foreignId('dist_id')
                  ->constrained('obub_districts')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->string('tvu_date', 50)->nullable();
            $table->string('block_sec_km', 100)->nullable();

            $table->foreignId('major_section_id')
                  ->constrained('obub_major_sections')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->foreignId('exe_agency_id')
                  ->constrained('agencies')   // existing agencies table
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            // Other fields
            $table->string('engg_officer', 150)->nullable();
            $table->string('sanc_details', 150)->nullable();
            $table->string('work_type', 100)->nullable();
            $table->string('gad_app', 50)->nullable();
            $table->string('est_sanct', 50)->nullable();
            $table->string('sanc_cost', 50)->nullable();
            $table->string('award_tender', 50)->nullable();
            $table->string('land_acqu', 50)->nullable();
            $table->string('phy_prog', 50)->nullable();
            $table->string('finan_prog', 50)->nullable();
            $table->string('gqgd', 50)->nullable();
            $table->string('pmo', 50)->nullable();
            $table->string('lc_location', 150)->nullable();
            $table->string('target', 100)->nullable();
            $table->string('tdc', 100)->nullable();
            $table->string('tdc_fy', 100)->nullable();
            $table->text('brief_remarks')->nullable();
            $table->string('target_rob', 100)->nullable();
            $table->string('target_rub', 100)->nullable();

            $table->date('completion_date')->nullable();
            $table->date('lc_elim_date')->nullable();

            // Audit fields
            $table->unsignedBigInteger('created_by')->nullable(); // user id
            $table->dateTime('created_on')->nullable();
            $table->dateTime('updated_on')->nullable();
        });
    }

    public function down(): void {
        Schema::dropIfExists('obub_data');
    }
};

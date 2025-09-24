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
         Schema::create('kavach_tender_data', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('kavach_item_id');
            $table->unsignedBigInteger('kavach_section_id');

            $table->enum('tender_status', ['HDN', 'LDN'])->nullable(); // tender status
            $table->date('nit_date')->nullable(); // Notice Inviting Tender
            $table->date('tender_opening_date')->nullable();
            $table->date('loa_date')->nullable(); // Letter of Acceptance
            $table->text('remarks')->nullable();
            $table->timestamp('updated_on')->nullable();
            $table->timestamps();
            // foreign keys
            $table->foreign('kavach_item_id')->references('id')->on('master_kavach_item')->onDelete('cascade');
            $table->foreign('kavach_section_id')->references('id')->on('master_kavach_section')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kavach_tender_data');
    }
};

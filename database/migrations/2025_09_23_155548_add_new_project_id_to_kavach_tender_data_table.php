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
        Schema::table('kavach_tender_data', function (Blueprint $table) {
            $table->unsignedBigInteger('new_project_id')->nullable()->after('kavach_section_id');

            $table->foreign('new_project_id')
                ->references('id')
                ->on('new_project')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kavach_tender_data', function (Blueprint $table) {
            $table->dropForeign(['new_project_id']);
            $table->dropColumn('new_project_id');
        });
    }
};

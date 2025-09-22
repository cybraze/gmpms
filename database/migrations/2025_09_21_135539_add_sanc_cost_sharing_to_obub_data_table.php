<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('obub_data', function (Blueprint $table) {
            // Award of Tender ke turant baad rakhenge
            $table->string('sanc_cost_sharing', 1)->nullable()->after('award_tender'); // values: Y/N
        });
    }

    public function down(): void {
        Schema::table('obub_data', function (Blueprint $table) {
            $table->dropColumn('sanc_cost_sharing');
        });
    }
};

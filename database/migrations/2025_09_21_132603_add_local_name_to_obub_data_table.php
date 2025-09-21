<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('obub_data', function (Blueprint $table) {
            $table->string('local_name', 150)
                  ->nullable()
                  ->after('lc_no'); // LC No ke turant baad
        });
    }

    public function down(): void {
        Schema::table('obub_data', function (Blueprint $table) {
            $table->dropColumn('local_name');
        });
    }
};

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('obub_data', function (Blueprint $table) {
            $table->string('div_id', 10)->change(); // 10 tak code aa sake
        });
    }
    public function down(): void {
        Schema::table('obub_data', function (Blueprint $table) {
            $table->string('div_id', 2)->change();
        });
    }
};

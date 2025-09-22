<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('obub_data', function (Blueprint $table) {
            // 5 rakh liya – NGP, BSP, आदि safe hai
            $table->string('div_id', 5)->change();
        });
    }
    public function down(): void {
        Schema::table('obub_data', function (Blueprint $table) {
            $table->string('div_id', 2)->change();
        });
    }
};

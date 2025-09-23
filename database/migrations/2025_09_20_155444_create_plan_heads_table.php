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
        Schema::create('plan_heads', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('code', 50)->unique(); // Plan head code
            $table->string('description', 255); // Plan head description
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_heads');
    }
};

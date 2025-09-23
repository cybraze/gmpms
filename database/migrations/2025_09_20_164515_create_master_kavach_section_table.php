<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('master_kavach_section', function (Blueprint $table) {
            $table->id();                  // id
            $table->string('section_name'); // section_name
            $table->timestamps();          // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_kavach_section');
    }
};


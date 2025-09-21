<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('kavach_training_section', function (Blueprint $table) {
            // 1) drop old FK (name error screen se confirm hai)
            if (Schema::hasColumn('kavach_training_section', 'staff_dept_id')) {
                $table->dropForeign('kavach_training_section_staff_dept_id_foreign');
                // 2) rename column to staff_id (type remains same)
                $table->renameColumn('staff_dept_id', 'staff_id');
            }
        });

        Schema::table('kavach_training_section', function (Blueprint $table) {
            // 3) add new FK to staff_master(id)
            $table->foreign('staff_id')
                  ->references('id')->on('staff_master')
                  ->cascadeOnDelete();
        });
    }

    public function down() {
        Schema::table('kavach_training_section', function (Blueprint $table) {
            // rollback: drop new FK, rename back, add old FK
            $table->dropForeign(['staff_id']);
            $table->renameColumn('staff_id', 'staff_dept_id');
        });

        Schema::table('kavach_training_section', function (Blueprint $table) {
            $table->foreign('staff_dept_id')
                  ->references('id')->on('department_master')
                  ->cascadeOnDelete();
        });
    }
};

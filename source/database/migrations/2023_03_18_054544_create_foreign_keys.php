<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on('groups');
        });

        Schema::table('groups', function (Blueprint $table) {
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foreign_keys');
    }
};

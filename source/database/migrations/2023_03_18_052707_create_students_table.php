<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic');
            $table->enum('sex', ['М', 'Ж']);
            $table->integer('group_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};

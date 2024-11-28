<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('student_belts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('belt_id')->constrained('belts');
            $table->date('obtained_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_belts');
    }
};

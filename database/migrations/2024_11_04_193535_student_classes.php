<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('student_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('class_id')->constrained('classes');
            $table->enum('status', ['Active', 'Inactive']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_classes');
    }
};

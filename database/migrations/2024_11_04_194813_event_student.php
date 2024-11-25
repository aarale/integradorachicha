<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('event_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events');
            $table->foreignId('student_id')->constrained('students');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_students');
    }
}

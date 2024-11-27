<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('belts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('color', 15);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('belts');
    }
};
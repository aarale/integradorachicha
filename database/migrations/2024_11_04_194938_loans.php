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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['loaned', 'returned']);
            $table->integer('quantity');
            $table->date('transaction_date');
            $table->date('devolution_date');
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('material_id')->constrained('materials');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('material_id')->constrained('materials');
            $table->enum('status', ['loaned', 'returned']);
            $table->integer('quantity');
            $table->date('transaction_date');
            $table->date('devolution_date');
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('material_id')->constrained('materials');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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

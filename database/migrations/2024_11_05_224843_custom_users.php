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
        Schema::create('custom_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained('people');
            $table->string('username', 50);
            $table->string('password');
            $table->string('email', 100);
            $table->string('recovery_email', 100)->nullable();
            $table->string('recovery_token', 255)->nullable();
            $table->timestamp('token_expiration')->nullable();
            $table->timestamp('registration_date')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps('cerated_at');
            $table->timestamps('updated_at');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_users');
    }
};

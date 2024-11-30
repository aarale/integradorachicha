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
        if (!Schema::hasTable('users')) 
        Schema::create('users', function (Blueprint $table){
            $table->id();
            $table->foreignId('person_id')->constrained('people');
            $table->string('username', 50);
            $table->string('password', 255);
            $table->string('email', 100);
            $table->string('recovery_email', 100)->nullable();
            $table->string('recovery_token', 255)->nullable();
            $table->time('token_expiration')->nullable();
            $table->boolean('active')->default(true);
            $table->binary('profile_picture')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

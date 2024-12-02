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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('person_id')->after('id');
            $table->string('recovery_email', 100)->nullable()->after('email');
            $table->string('recovery_token', 255)->nullable()->after('recovery_email');
            $table->time('token_expiration')->nullable()->after('recovery_token');
            $table->boolean('active')->default(1)->after('token_expiration');
            $table->binary('profile_picture')->nullable()->after('active'); 
            $table->foreign('person_id')->references('id')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['person_id']);
            $table->dropColumn([
                'person_id',
                'username',
                'recovery_email',
                'recovery_token',
                'token_expiration',
                'active',
                'profile_picture'
            ]);
        });
    }
};

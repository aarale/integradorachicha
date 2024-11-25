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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID único de tipo bigint que se incrementa automáticamente.
            $table->string('name'); // Nombre del usuario.
            $table->string('email')->unique(); // Email único para el usuario.
            $table->timestamp('email_verified_at')->nullable(); // Marca la fecha de verificación de email.
            $table->string('password'); // Contraseña del usuario.
            $table->rememberToken(); // Token para "recordar sesión".
            $table->timestamps(); // Crea columnas created_at y updated_at.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); // Elimina la tabla `users` si existe.
    }
};

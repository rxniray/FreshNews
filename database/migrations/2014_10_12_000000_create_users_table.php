<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ім'я користувача
            $table->string('avatar')->nullable(); // Додано поле для аватара
            $table->string('realnamename')->default('')->nullable(); // Ім'я користувача
            $table->longText('aboutuser')->default('')->nullable();
            $table->string('password'); // Пароль
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

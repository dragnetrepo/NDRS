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
            $table->id();
            $table->string('name')->default('');
            $table->string('first_name')->default('');
            $table->string('middle_name')->default('');
            $table->string('last_name')->default('');
            $table->string('email')->unique();
            $table->string('phone')->default('');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('temp_password')->default("");
            $table->enum('password_change', ["0", "1"])->default("0")->index();
            $table->string('display_picture')->default("");
            $table->string('contact_address')->default("");
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes()->index();
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

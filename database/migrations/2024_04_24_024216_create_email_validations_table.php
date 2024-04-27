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
        Schema::create('email_validations', function (Blueprint $table) {
            $table->id();
            $table->string("email")->default("")->index();
            $table->string("code", 10)->default("")->index();
            $table->enum("type", ["registration", "2fauth"])->default("registration")->index();
            $table->enum("status", ["pending", "confirmed", "failed"])->default("pending")->index();
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_validations');
    }
};

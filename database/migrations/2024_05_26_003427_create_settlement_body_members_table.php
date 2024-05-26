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
        Schema::create('settlement_body_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("sb_id")->default(0)->index();
            $table->unsignedInteger("user_id")->default(0)->index();
            $table->string("email")->default("")->index();
            $table->enum("status", ["active", "pending", "inactive"])->default("pending")->index();
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settlement_body_members');
    }
};

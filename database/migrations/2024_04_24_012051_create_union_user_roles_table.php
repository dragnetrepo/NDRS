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
        Schema::create('union_user_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->default(0)->index();
            $table->unsignedBigInteger("role_id")->default(0)->index();
            $table->unsignedBigInteger("union_id")->default(0)->index();
            $table->unsignedBigInteger("branch_id")->default(0)->index();
            $table->unsignedBigInteger("sub_branch_id")->default(0)->index();
            $table->enum("status", ["active", "pending", "suspended"])->default("pending")->index();
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('union_user_roles');
    }
};

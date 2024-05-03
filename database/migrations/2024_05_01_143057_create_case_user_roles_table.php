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
        Schema::create('case_user_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("case_id")->default(0)->index();
            $table->unsignedInteger("case_role_id")->default(0)->index();
            $table->unsignedInteger("user_id")->default(0)->index();
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_user_roles');
    }
};

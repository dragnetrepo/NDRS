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
        Schema::create('email_invitations', function (Blueprint $table) {
            $table->id();
            $table->string("email")->default("")->index();
            $table->string("token")->default("")->index();
            $table->unsignedInteger("union_id")->default(0)->index();
            $table->unsignedInteger("union_branch_id")->default(0)->index();
            $table->unsignedInteger("union_sub_branch_id")->default(0)->index();
            $table->unsignedInteger("role_id")->default(0)->index();
            $table->unsignedInteger("invited_by")->default(0)->index();
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_invitations');
    }
};

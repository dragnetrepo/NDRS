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
        Schema::create('support_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("user_id")->default(0)->index();
            $table->unsignedInteger("role_id")->default(0)->index();
            $table->unsignedInteger("union_id")->default(0)->index();
            $table->unsignedInteger("union_branch")->default(0)->index();
            $table->unsignedInteger("sub_branch")->default(0)->index();
            $table->string("full_name")->default("");
            $table->string("email")->default("")->index();
            $table->longText("message")->nullable();
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_messages');
    }
};

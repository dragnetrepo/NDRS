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
        Schema::create('case_discussion_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("cd_id")->default(0)->index();
            $table->unsignedInteger("user_id")->default(0)->index();
            $table->enum("message_type", ["text", "poll", "file", "scheduler"])->default("text")->index();
            $table->longText("content")->nullable();
            $table->unsignedInteger("reply_id")->default(0)->index();
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_discussion_messages');
    }
};

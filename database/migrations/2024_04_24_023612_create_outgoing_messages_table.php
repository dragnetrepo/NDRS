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
        Schema::create('outgoing_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->default(0)->index();
            $table->string("recipient")->default("");
            $table->longText("message_content")->nullable();
            $table->string("message_purpose")->default("");
            $table->enum("message_type", ["email", "sms", "notification", "none"])->default("none")->index();
            $table->dateTime("send_attempt")->nullable();
            $table->enum("status", ["pending", "sent", "failed"])->default("pending")->index();
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outgoing_messages');
    }
};

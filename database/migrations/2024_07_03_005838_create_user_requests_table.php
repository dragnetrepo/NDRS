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
        Schema::create('user_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->default(0)->index();
            $table->unsignedBigInteger("request_id")->default(0)->index();
            $table->enum("request_type", ["delete-org", "new-role", "new-org", "unknown"])->default("unknown")->index();
            $table->text("content")->nullable();
            $table->enum("status", ["pending", "approved", "declined"])->default("pending")->index();
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_requests');
    }
};

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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("case_id")->default(0)->index();
            $table->unsignedInteger("user_id")->default(0)->index();
            $table->string("email")->default("")->index();
            $table->unsignedInteger("triggered_by")->default(0)->index();
            $table->text("message")->nullable();
            $table->boolean("is_read")->index()->default(false);
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};

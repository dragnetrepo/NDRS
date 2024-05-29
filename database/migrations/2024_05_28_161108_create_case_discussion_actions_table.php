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
        Schema::create('case_discussion_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("cdm_id")->default(0)->index();
            $table->unsignedInteger("user_id")->default(0)->index();
            $table->string("action")->default("")->index();
            $table->string("response")->default("");
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_discussion_actions');
    }
};

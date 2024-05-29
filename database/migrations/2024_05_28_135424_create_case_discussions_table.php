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
        Schema::create('case_discussions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("case_id")->default("0")->index();
            $table->string("title")->default("")->index();
            $table->string("description")->default("")->index();
            $table->enum("type", ["group", "dm"])->default("group")->index();
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_discussions');
    }
};

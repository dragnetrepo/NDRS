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
        Schema::create('union_branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("union_id")->default(0)->index();
            $table->string("name", 191)->default("")->index();
            $table->string("acronym", 191)->default("")->index();
            $table->text("description")->nullable();
            $table->string("location")->default("");
            $table->string("founded_in")->default("");
            $table->string("logo")->default("");
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('union_branches');
    }
};

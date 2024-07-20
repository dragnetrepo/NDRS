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
        Schema::create('case_disputes', function (Blueprint $table) {
            $table->id();
            $table->string("case_id")->default("")->index();
            $table->string("case_title")->default("")->index();
            $table->string("dispute_type")->default("")->index();
            $table->unsignedInteger("union")->default("0")->index();
            $table->unsignedInteger("union_branch")->default("0")->index();
            $table->text("summary_of_dispute")->nullable();
            $table->text("background_info")->nullable();
            $table->text("relief_sought")->nullable();
            $table->text("specific_claims")->nullable();
            $table->text("negotiation_terms")->nullable();
            $table->string("status")->default("")->index();
            $table->unsignedInteger("created_by")->default("0")->index();
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_disputes');
    }
};

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
        Schema::create('case_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("case_id")->default(0)->index();
            $table->string("doc_name")->default("");
            $table->string("doc_description")->default("");
            $table->string("doc_size")->default("");
            $table->string("doc_type")->default("");
            $table->string("doc_path")->default("");
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_documents');
    }
};

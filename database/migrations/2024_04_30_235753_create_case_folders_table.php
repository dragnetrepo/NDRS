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
        Schema::create('case_folders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("case_id")->default(0)->index();
            $table->string("folder_name")->default("");
            $table->string("folder_description")->default("");
            $table->string("folder_size")->default("");
            $table->unsignedInteger("parent_folder")->default(0)->index();
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_folders');
    }
};

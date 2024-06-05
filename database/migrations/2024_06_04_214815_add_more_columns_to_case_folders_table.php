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
        Schema::table('case_folders', function (Blueprint $table) {
            $table->unsignedInteger("user_id")->default(0)->index()->after("case_id");
            $table->boolean("is_default")->default(false)->index()->after("parent_folder");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('case_folders', function (Blueprint $table) {
            //
        });
    }
};

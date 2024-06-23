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
        Schema::table('case_discussion_actions', function (Blueprint $table) {
            $table->unsignedBigInteger("cd_id")->default(0)->index()->after("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('case_discussion_actions', function (Blueprint $table) {
            //
        });
    }
};

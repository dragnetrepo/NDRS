<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE `case_discussion_messages` CHANGE `message_type` `message_type` ENUM('text','poll','file','scheduler','status update') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text';");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

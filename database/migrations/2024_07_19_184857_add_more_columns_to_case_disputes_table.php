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
        DB::statement("ALTER TABLE `case_disputes` CHANGE `status` `status` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '';");
        DB::statement("ALTER TABLE `case_disputes` ADD INDEX(`status`);");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('case_disputes', function (Blueprint $table) {
            //
        });
    }
};

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
        DB::statement("UPDATE `unions` SET industry = 0 WHERE 1");
        DB::statement("ALTER TABLE `unions` CHANGE `industry` `industry_id` INT(10) UNSIGNED NOT NULL DEFAULT 0;");

        DB::statement("UPDATE `union_branches` SET industry = 0 WHERE 1");
        DB::statement("ALTER TABLE `union_branches` CHANGE `industry` `industry_id` INT(10) UNSIGNED NOT NULL DEFAULT 0;");

        DB::statement("UPDATE `union_sub_branches` SET industry = 0 WHERE 1");
        DB::statement("ALTER TABLE `union_sub_branches` CHANGE `industry` `industry_id` INT(10) UNSIGNED NOT NULL DEFAULT 0;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

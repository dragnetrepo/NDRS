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
        DB::statement("UPDATE `roles` SET `name` = 'conciliators', `display_name` = 'Conciliators' WHERE `roles`.`id` = 7;");
        DB::statement("INSERT INTO `roles` (`id`, `name`, `display_name`, `type`, `is_default`, `guard_name`, `created_at`, `updated_at`) VALUES (NULL, 'arbitrators', 'Arbitrators', 'settlement-body', '1', 'sanctum', '2024-05-28 17:15:08', '2024-05-28 17:15:08');");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

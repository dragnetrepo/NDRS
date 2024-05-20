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
        Schema::table('case_user_roles', function (Blueprint $table) {
            $table->string("email", 191)->default("")->index()->after("user_id");
            $table->enum("status", ["active", "rejected", "pending", "suspended"])->default("pending")->index()->after("email");
            $table->timestamp("response_date")->nullable()->after("status");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('case_user_roles', function (Blueprint $table) {
            //
        });
    }
};

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
        Schema::table('email_invitations', function (Blueprint $table) {
            $table->enum("status", ["pending", "completed", "expired"])->default("pending")->index()->after("invited_by");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('email_invitations', function (Blueprint $table) {
            //
        });
    }
};

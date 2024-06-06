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
        Schema::table('case_discussions', function (Blueprint $table) {
            $table->unsignedBigInteger("sender_id")->default(0)->index()->after("case_id");
            $table->unsignedBigInteger("receiver_id")->default(0)->index()->after("sender_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('case_discussions', function (Blueprint $table) {
            //
        });
    }
};

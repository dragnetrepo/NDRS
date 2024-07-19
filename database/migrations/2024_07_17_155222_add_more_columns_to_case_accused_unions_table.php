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
        Schema::table('case_accused_unions', function (Blueprint $table) {
            $table->unsignedBigInteger("user_id")->default(0)->index()->after("union_sub_branch");
            $table->string("email")->default("")->index()->after("user_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('case_accused_unions', function (Blueprint $table) {
            //
        });
    }
};

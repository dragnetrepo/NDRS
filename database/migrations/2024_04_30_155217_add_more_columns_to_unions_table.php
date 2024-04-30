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
        Schema::table('unions', function (Blueprint $table) {
            $table->string("phone", 255)->default("")->after("location");
            $table->string("industry", 255)->default("")->after("phone");
            $table->string("headquarters", 255)->default("")->after("industry");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('unions', function (Blueprint $table) {
            //
        });
    }
};

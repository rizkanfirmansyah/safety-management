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
        Schema::table('safeties', function (Blueprint $table) {
            $table->string('post_mitigation', 255)->after('risk_index')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('safeties', function (Blueprint $table) {
            $table->string('post_mitigation', 255)->after('risk_index')->nullable();
        });
    }
};

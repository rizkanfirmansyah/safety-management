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
        Schema::create('safeties', function (Blueprint $table) {
            $table->id();
            $table->string('number', 125);
            $table->char('reporter', 50)->nullable();
            $table->char('classification', 50)->nullable();
            $table->date('date_of_submission')->nullable();
            $table->date('date_of_hazard_identification')->nullable();
            $table->string('location', 255)->nullable();
            $table->string('type_operation', 125)->nullable();
            $table->text('description')->nullable();
            $table->string('file_reporter', 125)->nullable();
            $table->char('risk_probability', 50)->nullable();
            $table->char('risk_severity', 50)->nullable();
            $table->char('risk_index', 50)->nullable();
            $table->char('cop', 50)->nullable();
            $table->char('hm', 50)->nullable();
            $table->char('co', 50)->nullable();
            $table->char('responsible', 50)->nullable();
            $table->string('file_response', 125)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('safeties');
    }
};

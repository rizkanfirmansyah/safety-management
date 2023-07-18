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
            $table->string('Number', 125);
            $table->char('Reporter', 50)->nullable();
            $table->char('Classification', 50)->nullable();
            $table->datetime('Date of Submission')->nullable();
            $table->datetime('Date of Hazard Identification')->nullable();
            $table->string('Location', 255)->nullable();
            $table->string('Type Operation', 125)->nullable();
            $table->text('Description')->nullable();
            $table->string('File Reporter', 125)->nullable();
            $table->char('Risk Probability', 50)->nullable();
            $table->char('Risk Severity', 50)->nullable();
            $table->char('Risk Index', 50)->nullable();
            $table->char('COP', 50)->nullable();
            $table->char('HM', 50)->nullable();
            $table->char('CO', 50)->nullable();
            $table->char('Responsible', 50)->nullable();
            $table->string('File Response', 125)->nullable();
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

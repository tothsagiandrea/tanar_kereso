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
        Schema::create('grades_for_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grade')->references('id')->on('grades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('subject')->references('id')->on('subjects')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();

            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades_for_subject');
    }
};
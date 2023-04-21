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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->mediumText('curriculum_vitae');
            $table->smallInteger('hourly_rate');
            $table->string('profile_pic_path', 500)->nullable();
            $table->string('profile_video_path', 500)->nullable();
            $table->foreignId('user')->references('id')->on('users')->onUpdate('cascade')->onDelete;
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
        Schema::dropIfExists('teachers');
    }
};

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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('recipient_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('notifiable_id');
            $table->string('notifiable_type');
            $table->string('content')->nullable();
            $table->string('url')->nullable();
            $table->smallInteger('has_read')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
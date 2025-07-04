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
        Schema::create('reward_requests', function (Blueprint $table) {
           
        $table->id();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->foreignId('reward_id')->constrained()->cascadeOnDelete();
        $table->string('phone', 15); // نسخة من رقم الهاتف وقت الطلب
        $table->string('status')->default('pending'); // pending, approved, rejected
        $table->text('admin_notes')->nullable();
        $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reward_requests');
    }
};

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
        Schema::create('prepaid_cards', function (Blueprint $table) {
                $table->id();
    $table->string('code')->unique()->index(); // رمز فريد
    $table->integer('points')->unsigned(); // عدد النقاط (موجب دائماً)
    $table->boolean('is_used')->default(false);
    $table->date('expires_at');
    $table->foreignId('created_by')->constrained('users'); // المسؤول الذي أنشأ الكرت
    $table->foreignId('used_by')->nullable()->constrained('users'); // المستخدم الذي استخدمه
    $table->timestamp('used_at')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prepaid_cards');
    }
};

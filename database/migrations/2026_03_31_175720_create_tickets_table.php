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
        Schema::create('tickets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('status', ['active', 'cancelled', 'used'])->default('active');
            $table->string('qr_code')->unique();

            $table->foreignUuid('user_id')->constrained()->restrictOnDelete();
            $table->foreignUuid('event_id')->constrained()->restrictOnDelete();
            $table->foreignUuid('payment_id')->constrained()->restrictOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};

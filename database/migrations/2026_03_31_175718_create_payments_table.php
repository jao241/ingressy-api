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
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->enum('payment_method', ['credit_card', 'pix', 'boleto']);
            $table->integer('installments')->nullable();
            $table->decimal('fee', 10, 2)->default(0);

            $table->enum('status', ['pending', 'approved', 'refused', 'refunded'])->default('pending');

            $table->decimal('amount', 10, 2);
            $table->timestamp('paid_at')->nullable();

            $table->foreignUuid('event_id')->constrained()->restrictOnDelete();
            $table->foreignUuid('user_id')->constrained()->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 15, 2);
            $table->enum('status', ['pago', 'pendente', 'cancelado', 'falho']);
            $table->bigInteger('asaas_payment_id')->nullable();
            $table->string('asaas_pix_qr')->nullable();
            $table->string('asaas_pix_code')->nullable();
            $table->date('transaction_date');
            $table->date('payment_date')->nullable();
            $table->foreignId('compaign_id')->constrained('compaigns')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};

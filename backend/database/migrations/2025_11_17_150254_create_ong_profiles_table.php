<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ong_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('cnpj')->unique()->nullable();
            $table->string('image_path')->nullable();
            $table->string('website_url')->nullable();
            $table->bigInteger('asaas_customer_id')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ong_profiles');
    }
};

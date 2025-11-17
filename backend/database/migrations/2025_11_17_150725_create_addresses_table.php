<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('zipcode');
            $table->string('neighborhood');
            $table->string('street');
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('addressable_type');
            $table->unsignedBigInteger('addressable_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};

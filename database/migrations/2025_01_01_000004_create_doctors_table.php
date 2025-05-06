<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('doctor_id'); // sesuai SQL kamu
            $table->string('name', 100);
            $table->string('specialization', 100);
            $table->string('phone_number', 20);
            $table->string('email', 100);
            $table->string('license_number', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};

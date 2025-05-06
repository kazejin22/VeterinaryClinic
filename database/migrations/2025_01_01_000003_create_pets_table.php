<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id('pet_id'); // PRIMARY KEY custom = "pet_id" 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('species');
            $table->string('breed')->nullable();
            $table->integer('age')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};

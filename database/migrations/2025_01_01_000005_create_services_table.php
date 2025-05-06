<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();                                  // primary key
            $table->string('service_name', 100);           // nama layanan
            $table->text('description')->nullable();       // deskripsi (boleh kosong)
            $table->decimal('cost', 10, 2);                // biaya layanan
            $table->timestamps();                          // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client_appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('pet_id');
            $table->foreignId('doctor_id')->nullable();
            $table->dateTime('appointment_date');
            $table->longText('description')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_appointments');
    }
};

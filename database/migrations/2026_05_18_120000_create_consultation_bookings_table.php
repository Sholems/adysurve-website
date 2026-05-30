<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultation_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('service_interest')->nullable();
            $table->date('preferred_date');
            $table->string('preferred_time');
            $table->string('meeting_mode')->default('Phone Call');
            $table->text('notes')->nullable();
            $table->string('status')->default('pending');
            $table->boolean('is_read')->default(false);
            $table->timestamps();

            $table->index(['preferred_date', 'preferred_time']);
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultation_bookings');
    }
};

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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->string('customer_name');
            $table->string('customer_email')->unique()->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_phone');

            $table->enum('status', ['approve', 'inapprove'])->default('approve');

            $table->text('note')->nullable();
            $table->date('date_booking');
            $table->time('appointment_time');

            // *Forein Key
            $table->unsignedBigInteger('doctor_category_id');
            $table->foreign('doctor_category_id')->references('id')->on('doctor_categories');

            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');

     

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

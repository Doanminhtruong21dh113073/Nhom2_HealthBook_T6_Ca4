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
        Schema::create('date_offs', function (Blueprint $table) {
            $table->id();
            $table->text('reason_off')->nullable();

            $table->date('date_off')->nullable();
            $table->date('start_date');
            $table->date('end_date');

            $table->enum('status', ['approve', 'inapprove'])->default('approve');
            
            // *Forein Key
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('date_offs');
    }
};

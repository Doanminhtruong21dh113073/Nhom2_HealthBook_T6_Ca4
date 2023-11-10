<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('customer');
            $table->string('phone');
            $table->string('email');
            $table->unsignedBigInteger('service');
            $table->foreign('service')->references('id')->on('services');
            $table->unsignedBigInteger('barber');
            $table->foreign('barber')->references('id')->on('users');
            $table->string('category');
            $table->string('date');
            $table->string('price');
            $table->string('time', $precision = 0);
            $table->text('text')->nullable();
            $table->integer('level');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('ischeckout')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
};

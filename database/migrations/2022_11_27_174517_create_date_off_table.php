<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_off', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barber');
            $table->foreign('barber')->references('id')->on('users');
            $table->text('reason');
            $table->dateTime('start_day');
            $table->dateTime('end_day');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('date_off');
    }
};
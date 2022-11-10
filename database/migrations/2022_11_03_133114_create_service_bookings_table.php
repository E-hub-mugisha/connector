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
        Schema::create('service_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->enum('status', ['pending', 'processing', 'completed', 'decline'])->default('pending');
            
            $table->decimal('total');
            $table->string('payment_method')->nullable();

            $table->string('names');
            $table->text('email');
            $table->string('phone');
            $table->string('location'); 
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_bookings');
    }
};

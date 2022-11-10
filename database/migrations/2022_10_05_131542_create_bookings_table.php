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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_id')->index();
            $table->string('service_name');
            $table->string('service_category');
            $table->string('service_provider');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('location');
            $table->string('date');
            $table->string('time');
            $table->longText('description')->nullable();
            $table->string('payment_mode');
            $table->decimal('discount')->nullable();
            $table->decimal('total');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('bookings');
    }
};

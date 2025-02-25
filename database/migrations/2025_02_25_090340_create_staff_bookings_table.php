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
        Schema::create('staff_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');  // Foreign key to services table
            $table->foreignId('staff_id')->constrained('staff_members')->onDelete('cascade');  // Foreign key to staff_members table
            $table->string('status');  // Status of the booking (pending, confirmed, etc.)
            $table->dateTime('time');  // The time of the booking
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
        Schema::dropIfExists('staff_bookings');
    }
};

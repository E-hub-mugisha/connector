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
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['pending', 'approved', 'completed', 'decline', 'canceled', 'rescheduled'])->default('pending');
            $table->foreignId('service_provider_id')->constrained('service_providers')->onDelete('cascade');
            $table->decimal('total', 8, 2);
            $table->string('payment_mode')->nullable();
            $table->string('names');
            $table->text('email');
            $table->string('phone');
            $table->string('location');
            $table->text('notes')->nullable();
            $table->string('date');
            $table->string('time');
            $table->foreignId('staff_id')->nullable()->constrained('staff_members')->onDelete('set null');
            $table->timestamps();  // created_at, updated_at
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

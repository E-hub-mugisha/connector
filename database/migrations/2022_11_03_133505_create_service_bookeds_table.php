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
        Schema::create('service_bookeds', function (Blueprint $table) {
            
            $table->bigIncrements('id');

            $table->unsignedBigInteger('book_id')->index();
            $table->unsignedBigInteger('service_id')->index();
            $table->decimal('price', 20, 6);

            $table->foreign('book_id')->references('id')->on('service_bookings')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

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
        Schema::dropIfExists('service_bookeds');
    }
};

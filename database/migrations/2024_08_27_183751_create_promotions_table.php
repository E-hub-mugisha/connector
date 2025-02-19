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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_provider_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->text('description');
            $table->decimal('discount', 5, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('service_provider_id')->references('id')->on('service_providers')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('service_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
};

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
        Schema::table('service_sub_categories', function (Blueprint $table) {
            //
            $table->bigInteger('service_id')->unsigned()->nullable();  // Add service_id column
            $table->foreign('service_id')->references('id')->on('services')->onDelete('set null'); // Foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_sub_categories', function (Blueprint $table) {
            //
            $table->dropForeign(['service_id']);  // Drop foreign key constraint
            $table->dropColumn('service_id');  // Drop service_id column
        });
    }
};

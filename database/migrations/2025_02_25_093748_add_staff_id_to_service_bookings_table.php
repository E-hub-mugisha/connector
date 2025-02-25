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
        Schema::table('service_bookings', function (Blueprint $table) {
            // Add the staff_id column with nullable and unsignedBigInteger type
            $table->unsignedBigInteger('staff_id')->nullable()->after('time'); 

            // Define the foreign key constraint on staff_id
            $table->foreign('staff_id')->references('id')->on('staff_members')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_bookings', function (Blueprint $table) {
            // Drop the foreign key and the staff_id column
            $table->dropForeign(['staff_id']);
            $table->dropColumn('staff_id');
        });
    }
};

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
        Schema::table('blogs', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->nullable();
            $table->enum('status', ['pending', 'approved', 'declined'])->default('pending');
            $table->integer('featured')->default(0);
            
            // If you have an 'authors' table
            $table->foreign('author_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropForeign(['author_id']);
            $table->dropColumn(['author_id', 'status', 'featured']);
        });
    }
};

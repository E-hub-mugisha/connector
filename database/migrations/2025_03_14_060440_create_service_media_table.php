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
    public function up(): void
    {
        Schema::create('service_media', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->string('file_path'); // Stores media file paths
            $table->enum('type', ['image', 'video']); // Defines media type
            $table->timestamps(); // Creates 'created_at' & 'updated_at'
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_media');
    }
};

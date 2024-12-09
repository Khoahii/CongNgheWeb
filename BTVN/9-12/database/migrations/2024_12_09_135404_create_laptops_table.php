<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->id(); // Primary key: id (auto-increment)
            $table->string('brand'); // Laptop brand
            $table->string('model'); // Laptop model
            $table->string('specifications'); // Specifications
            $table->boolean('rental_status'); // Rental status (true/false)
            $table->unsignedBigInteger('renter_id')->nullable(); // Foreign key: renter_id
            $table->timestamps(); // Created_at and updated_at

            // Foreign key constraint
            $table->foreign('renter_id')->references('id')->on('renters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};

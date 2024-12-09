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
        Schema::create('renters', function (Blueprint $table) {
            $table->id(); // Primary key: id (auto-increment)
            $table->string('name'); // Renter name
            $table->string('phone_number'); // Phone number
            $table->string('email')->unique(); // Email address
            $table->timestamps(); // Created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('renters');
    }
};

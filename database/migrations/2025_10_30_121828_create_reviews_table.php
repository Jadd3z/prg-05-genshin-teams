<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('body'); // The review content
            $table->unsignedTinyInteger('rating')->default(5); // Rating out of 5, for example

            // Foreign Key to link to the 'products' table
            $table->foreignId('TeamID')
                ->constrained() // Infers 'products' table and 'id' column
                ->onDelete('cascade'); // Required for the final deletion assignment

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }

};

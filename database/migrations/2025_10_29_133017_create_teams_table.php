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
        Schema::create('teams', function (Blueprint $table) {
            $table->id('TeamID'); // Primary Key (PK)
            $table->string('TeamName');
            $table->unsignedBigInteger('MainCharacterID')->nullable(); // Foreign Key reference
            $table->string('PrimaryReaction')->nullable();
            $table->timestamps();

            // Define the MainCharacterID as a Foreign Key (Optional, but good practice)
            $table->foreign('MainCharacterID')->references('CharacterID')->on('characters')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
